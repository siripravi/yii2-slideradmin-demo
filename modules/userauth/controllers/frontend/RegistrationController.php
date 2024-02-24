<?php

namespace app\modules\userauth\controllers\frontend;

use app\models\Profile;
use app\models\RegistrationForm;
use app\models\User;
use app\models\Token;
use app\components\events\UserRegistrationEvent;
use siripravi\userhelper\Finder;

use siripravi\userhelper\models\ResendForm;
use siripravi\userhelper\traits\AjaxValidationTrait;
use siripravi\userhelper\traits\EventTrait;
use yii\base\Exception;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * RegistrationController is responsible for all registration process, which includes registration of a new account,
 * resending confirmation tokens, email confirmation and registration via social networks.
 *
 * @property \siripravi\userhelper\Module $module
 * @method StaticPageBehavior registerStaticSeoData
 *
 * @author Dmitry Erofeev <dmeroff@gmail.com>
 */
class RegistrationController extends Controller
{
    use AjaxValidationTrait;
    use EventTrait;

    /**
     * Event is triggered after creating RegistrationForm class.
     * Triggered with \siripravi\userhelper\events\FormEvent.
     */
    const EVENT_BEFORE_REGISTER = 'beforeRegister';

    /**
     * Event is triggered after successful registration.
     * Triggered with \siripravi\userhelper\events\FormEvent.
     */
    const EVENT_AFTER_REGISTER = 'afterRegister';

    /**
     * Event is triggered before connecting user to social account.
     * Triggered with \siripravi\userhelper\events\UserEvent.
     */
    const EVENT_BEFORE_CONNECT = 'beforeConnect';

    /**
     * Event is triggered after connecting user to social account.
     * Triggered with \siripravi\userhelper\events\UserEvent.
     */
    const EVENT_AFTER_CONNECT = 'afterConnect';

    /**
     * Event is triggered before confirming user.
     * Triggered with \siripravi\userhelper\events\UserEvent.
     */
    const EVENT_BEFORE_CONFIRM = 'beforeConfirm';

    /**
     * Event is triggered before confirming user.
     * Triggered with \siripravi\userhelper\events\UserEvent.
     */
    const EVENT_AFTER_CONFIRM = 'afterConfirm';

    /**
     * Event is triggered after creating ResendForm class.
     * Triggered with \siripravi\userhelper\events\FormEvent.
     */
    const EVENT_BEFORE_RESEND = 'beforeResend';

    /**
     * Event is triggered after successful resending of confirmation email.
     * Triggered with \siripravi\userhelper\events\FormEvent.
     */
    const EVENT_AFTER_RESEND = 'afterResend';

    /** @var Finder */
    protected $finder;

    
    /**
     * @param string           $id
     * @param \yii\base\Module $module
     * @param Finder           $finder
     * @param array            $config
     */
    public function __construct($id, $module, Finder $finder, $config = [])
    {
        $this->finder = $finder;
        $this->finder->userQuery = User::find();
        $this->finder->tokenQuery = Token::find();
        parent::__construct($id, $module, $config);
    }

    /** @inheritdoc */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    ['allow' => true, 'actions' => ['register', 'connect'], 'roles' => ['?']],
                    ['allow' => true, 'actions' => ['confirm', 'resend'], 'roles' => ['?', '@']],
                ],
            ]
        ];
    }
    public function getViewPath()
    {
        return \Yii::getAlias('@app/modules/userauth/views/user/registration');
    }

    /**
     * Displays the registration page.
     * After successful registration if enableConfirmation is enabled shows info message otherwise
     * redirects to home page.
     *
     * @return string
     * @throws \yii\web\HttpException
     * @throws Exception
     */
    public function actionRegister()
    {
        if (!$this->module->enableRegistration) {
            throw new NotFoundHttpException();
        }

        $user = new RegistrationForm();
        $profile = new Profile();

        $this->performAjaxValidation($user);

        if (\Yii::$app->request->isPost) {
            $post = \Yii::$app->request->post();
            if ($user->load($post)) {
                $user->username = $user->email;
                if ($profile->load($post)) {
                    if ($profile->user_id = $user->register()) {

                        if ($profile->validate()) {
                            $profile->save();

                            $this->trigger(self::EVENT_AFTER_REGISTER, new UserRegistrationEvent([
                                'id' => $profile->user_id
                            ]));

                            return $this->render('message', [
                                'title'  => \Yii::t('user', 'Your account has been created'),
                                'module' => $this->module,
                                'profile' => $profile
                            ]);
                        }
                    }
                }
                throw new Exception(\Yii::t('user', 'Registration error'));
            }
        }

        return $this->render('register', [
            'model'  => $user,
            'profile' => $profile,
            'module' => $this->module,
        ]);
    }

    /**
     * Displays page where user can create new account that will be connected to social account.
     *
     * @param string $code
     *
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionConnect($code)
    {
        $account = $this->finder->findAccount()->byCode($code)->one();

        if ($account === null || $account->getIsConnected()) {
            throw new NotFoundHttpException();
        }

        /** @var User $user */
        $user = \Yii::createObject([
            'class'    => User::class,
            'scenario' => 'connect',
            'email'    => $account->email,
        ]);

        $event = $this->getConnectEvent($account, $user);

        $this->trigger(self::EVENT_BEFORE_CONNECT, $event);

        if ($user->load(\Yii::$app->request->post()) && $user->create()) {
            $account->connect($user);
            $this->trigger(self::EVENT_AFTER_CONNECT, $event);
            \Yii::$app->user->login($user, $this->module->rememberFor);
            return $this->goBack();
        }
        return $this->render('connect', [
            'model'   => $user,
            'account' => $account,
        ]);
    }

    /**
     * Confirms user's account. If confirmation was successful logs the user and shows success message. Otherwise
     * shows error message.
     *
     * @param int    $id
     * @param string $code
     *
     * @return string
     * @throws \yii\web\HttpException
     */
    public function actionConfirm($id, $code, $return = '/user/security/login')
    {

        $user = $this->finder->findUserById($id);

        if ($user === null || $this->module->enableConfirmation == false) {
            throw new NotFoundHttpException();
        }

        $event = $this->getUserEvent($user);

        $this->trigger(self::EVENT_BEFORE_CONFIRM, $event);
        $user->finder = $this->finder;
        $user->attemptConfirmation($code);

        $this->trigger(self::EVENT_AFTER_CONFIRM, new UserRegistrationEvent([
            'id' => $user->id
        ]));

        if (!empty($return)) {
            \Yii::$app->user->setReturnUrl($return);
            return $this->redirect($return);
        }

        return $this->render('message', [
            'title'  => \Yii::t('user', 'Account confirmation'),
            'module' => $this->module,
        ]);
    }

    /**
     * Displays page where user can request new confirmation token. If resending was successful, displays message.
     *
     * @return string
     * @throws \yii\web\HttpException
     */
    public function actionResend()
    {
        if ($this->module->enableConfirmation == false) {
            throw new NotFoundHttpException();
        }

        $model = \Yii::createObject(ResendForm::class, ['finder' => $this->finder]);

        $event = $this->getFormEvent($model);

        $this->trigger(self::EVENT_BEFORE_RESEND, $event);

        $this->performAjaxValidation($model);

        if ($model->load(\Yii::$app->request->post()) && $model->resend()) {
            $this->trigger(self::EVENT_AFTER_RESEND, $event);

            return $this->render('message', [
                'title'  => \Yii::t('user', 'A new confirmation link has been sent'),
                'module' => $this->module,
            ]);
        }

        return $this->render('resend', [
            'model' => $model,
        ]);
    }
}
