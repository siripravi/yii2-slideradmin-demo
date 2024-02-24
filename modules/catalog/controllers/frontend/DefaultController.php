<?php

namespace app\modules\userauth\controllers\frontend;

use siripravi\userhelper\controllers\SecurityController as MainController;
use luya\cms\menu\QueryOperatorFieldInterface;
use luya\helpers\Url;
use app\modules\userauth\frontend\Module;
use app\modules\userauth\models\LoginForm;
use Yii;
use yii\filters\HttpCache;

/**
 * User Login.
 *
 * @author Basil Suter <basil@nadar.io
 * @since 1.0.0
 */
class DefaultController extends MainController
{
    /**
     * {@inheritDoc}
     */
    public function behaviors()
    {
        return [
            'httpCache' => [
                'class' => HttpCache::class,
                'cacheControlHeader' => 'no-store, no-cache',
                'lastModified' => function ($action, $params) {
                    return time();
                },
            ],
        ];
    }

    /**
     * Render the login form model.
     *
     * @return \yii\web\Response|string
     */
    public function actionIndex($redir = null)
    {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect($this->getRedirectUrl($redir));
        }

        //  $model = new LoginForm();

        /*  if ($model->load(Yii::$app->request->post()) && $model->validate() && Yii::$app->user->login($model->user)) {
            return $this->redirect($this->getRedirectUrl($redir));
        }*/
        /*   $cart = Cart::getCart();
        if (!\Yii::$app->user->isGuest) {
           if(!empty($cart))
                \Yii::$app->getResponse()->redirect(Url::to(['/cart/bag/index']));
             else
                \Yii::$app->getResponse()->redirect(Url::to([\Yii::$app->getHomeUrl()]));

        } */
        //   $returnUrl =  \Yii::$app->request->referrer ;


        /** @var LoginForm $model */
        $model = Yii::createObject(LoginForm::class);
        $event = $this->getFormEvent($model);

        $this->performAjaxValidation($model);
        $this->trigger(self::EVENT_BEFORE_LOGIN, $event);

        if ($model->load(Yii::$app->getRequest()->post()) && $model->login()) {
            $this->trigger(self::EVENT_AFTER_LOGIN, $event);
            //    \Yii::$app->user->setReturnUrl($returnUrl);

            //  return \Yii::$app->getResponse()->redirect($returnUrl);

            return $this->redirect($this->getRedirectUrl($redir));
        }

        return $this->renderAjax('index', [
            'model' => $model,  'module' => $this->module,
        ]);
    }

    /**
     * Get the redirect url from config, redir parmater or default base (home) url.
     *
     * @param string $redir Optional urlencoded redirect from url
     * @return string
     */
    protected function getRedirectUrl($redir)
    {
        if (!empty($redir)) {
            return urldecode($redir);
        }

        $navId = Yii::$app->getModule('userauthfrontend')->params[Module::USERAUTH_CONFIG_AFTER_LOGIN_NAV_ID];

        //Config::get(Module::USERAUTH_CONFIG_AFTER_LOGIN_NAV_ID, false);

        if ($navId) {
            $navItem = Yii::$app->menu->find()->where([QueryOperatorFieldInterface::FIELD_NAVID => $navId])->with(['hidden'])->one();

            if ($navItem) {
                return $navItem->absoluteLink;
            }
        }

        return Url::base(true);
    }
}
