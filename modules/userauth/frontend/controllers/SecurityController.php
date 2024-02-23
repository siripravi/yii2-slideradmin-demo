<?php

namespace app\modules\userauth\frontend\controllers;

use siripravi\authhelper\controllers\SecurityController as MainController;
use app\models\LoginForm;
use siripravi\shopcart\models\Cart;
use yii\helpers\Url;
use yii\web\Response;


/**
 * @author Albert Gainutdinov <xalbert.einsteinx@gmail.com>
 */
class SecurityController extends MainController
{
    public function getViewPath()
    {
        return \Yii::getAlias('@userauthfrontend/views/user/security');
    }
    /**
     * Displays the login page.
     *
     * @return string|Response
     */
    public function actionLogin()
    {

        if (!\Yii::$app->user->isGuest) {
            $cart = \Yii::$app->cart->getItems();
            if (!empty($cart))
                \Yii::$app->getResponse()->redirect(Url::to(['/shopping-cart']));
            else
                \Yii::$app->getResponse()->redirect(Url::to([\Yii::$app->getHomeUrl()]));
        }
        $returnUrl =  \Yii::$app->request->referrer;
        /** @var LoginForm $model */
        $model = \Yii::createObject(LoginForm::class);
        $event = $this->getFormEvent($model);

        $this->performAjaxValidation($model);
        $this->trigger(self::EVENT_BEFORE_LOGIN, $event);

        if ($model->load(\Yii::$app->getRequest()->post()) && $model->login()) {
            $this->trigger(self::EVENT_AFTER_LOGIN, $event);

            //Checking return url
            /*   if (!empty($model->returnUrl)) {
                $host = \Yii::$app->request->hostInfo;
                $returnUrlHost = substr($model->returnUrl, 0, strlen($host));
                if ($returnUrlHost == $host) {
                    $returnUrl = $model->returnUrl;
                }
                else {
                    $returnUrl = \Yii::$app->user->returnUrl;
                }
            }
            else {
                $returnUrl = Url::to([\Yii::$app->user->returnUrl]);
            }
            */

            \Yii::$app->user->setReturnUrl($returnUrl);

            return \Yii::$app->getResponse()->redirect($returnUrl);
        }

        return $this->render('login', [
            'model'  => $model,
            'module' => $this->module,
        ]);
    }

    /**
     * Logs the user out and then redirects to the homepage.
     *
     * @return Response
     */
    public function actionLogout()
    {
        $event = $this->getUserEvent(\Yii::$app->user->identity);

        $this->trigger(self::EVENT_BEFORE_LOGOUT, $event);

        \Yii::$app->getUser()->logout();

        $this->trigger(self::EVENT_AFTER_LOGOUT, $event);

        \Yii::$app->getResponse()->redirect(Url::to([\Yii::$app->getHomeUrl()]));
    }
}
