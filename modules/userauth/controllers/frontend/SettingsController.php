<?php

namespace app\modules\userauth\controllers\frontend;

use app\modules\userauth\models\Profile;
use app\modules\userauth\models\UserAddress;
use siripravi\userhelper\controllers\SettingsController as BaseController;
use yii\base\Exception;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use siripravi\userhelper\Finder;
use yii\helpers\Url;
use yii\web\ForbiddenHttpException;

/**
 * @author Albert Gainutdinov <xalbert.einsteinx@gmail.com>
 * This controller adds some actions for siripravi\userhelper\controllers\SettingsController
 * Its manage updating user settings (e.g. profile, email and password).
 *
 * @property \siripravi\userhelper\Module $module
 *
 */
class SettingsController extends BaseController
{
    protected $finder;
    public function __construct($id, $module, Finder $finder, $config = [])
    {
        $this->finder = $finder;
        $this->finder->profileQuery = Profile::find();
        parent::__construct($id, $module, $config);
    }
    public function getViewPath()
    {
        return \Yii::getAlias('@app/modules/userauth/views/user/settings');
    }
    /** @inheritdoc */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'disconnect' => ['post'],
                    'delete'     => ['post'],
                ],
            ],
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow'   => true,
                        'actions' => ['profile', 'account', 'networks', 'disconnect', 'delete', 'addresses', 'save-address', 'delete-address'],
                        'roles'   => ['@'],
                    ],
                    [
                        'allow'   => true,
                        'actions' => ['confirm'],
                        'roles'   => ['?', '@'],
                    ],
                ],
            ],
        ];
    }

    public function actionAddresses()
    {
        $addresses = \Yii::$app->user->identity->profile->userAddresses;
        return $this->render('addresses', [
            'addresses' => $addresses
        ]);
    }

    public function actionSaveAddress($id = null)
    {
        if (!empty($id)) {
            $address = UserAddress::findOne($id);
            if ($address->user_profile_id == \Yii::$app->user->identity->profile->id) {
                if ($address->load(\Yii::$app->request->post())) {
                    if ($address->validate()) {
                        $address->save();
                        return $this->redirect(Url::toRoute('/user/settings/addresses'));
                    } else throw new Exception($address->errors);
                }
                return $this->render('save-address', [
                    'address' => $address
                ]);
            } else throw new ForbiddenHttpException();
        } else {
            $address = new UserAddress();
            if ($address->load(\Yii::$app->request->post())) {
                $address->user_profile_id = \Yii::$app->user->identity->profile->id;
                if ($address->validate()) {
                    $address->save();
                    return $this->redirect('addresses');
                }
            }
            return $this->render('save-address', [
                'address' => $address
            ]);
        }
    }

    public function actionDeleteAddress($id)
    {
        if (!empty($id)) {
            $address = UserAddress::findOne($id);
            if ($address->user_profile_id == \Yii::$app->user->identity->profile->id) {
                $address->delete();
                //  \Yii::$app->session->remove(\Yii::$app->forms->sessionFormDataName);
                //return $this->redirect('addresses');
                return $this->redirect(\Yii::$app->request->referrer);
            } else throw new ForbiddenHttpException('Such address does not exists or it is not your address.');
        } else throw new ForbiddenHttpException('Id can not be empty.');
    }

    /**
     * Shows profile settings form.
     *
     * @return string|\yii\web\Response
     */
    public function actionProfile()
    {
        $model = $this->finder->findProfileById(\Yii::$app->user->identity->getId());

        if ($model == null) {
            $model = \Yii::createObject(Profile::class);
            $model->link('user', \Yii::$app->user->identity);
        }

        $event = $this->getProfileEvent($model);

        $this->performAjaxValidation($model);

        $this->trigger(self::EVENT_BEFORE_PROFILE_UPDATE, $event);
        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            \Yii::$app->getSession()->setFlash('success', \Yii::t('user', 'Your profile has been updated'));
            $this->trigger(self::EVENT_AFTER_PROFILE_UPDATE, $event);
            return $this->refresh();
        }
        return $this->render('profile', [
            'model' => $model,
        ]);
    }
}
