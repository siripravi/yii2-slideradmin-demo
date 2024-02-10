<?php

namespace app\admin\controllers;

use app\admin\models\LoginForm;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\admin\components\BaseController;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends BaseController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ], 
        ];
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {     
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->renderAjax('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    
    public function actionCreate(){
		$model = new Layer();
		$model->loadDefaultValues();
		 if($model->load(Yii::$app->request->post())){
			//if($model->type_id == 3) $model->angleStart = 180;
		 $model->hash = (isset($_SESSION['wgt_key']))? $_SESSION['wgt_key']:Layer::generateSecret();
         Yii::$app->session->set('wgt_key',$model->hash);
			 if(!$model->save())  {
			 print_r($model->getErrors()); die;
			 }
			 return $this->redirect(
			 ['index','text' => $model->text]);
		 }
        $textTypes = LayerType::find()->all();  
        return $this->renderAjax('create', [
            'model' => $model, 'types'=> $textTypes
        ]);
	}
	

    /**
     * Updates a Layer.
     *
     * @return Response|string
     */
    public function actionUpdate(){
		$session = Yii::$app->session;	$postArr = [];	$result = [];
		$settings = Layer::find()->where(['hash'=>$session['wgt_key']])->indexBy('id')->all();
        $post = Yii::$app->request->post('Layer');
		if($post){
			// $postArr = json_decode($post);
		 $result = ArrayHelper::index($post, 'id');
		
		foreach($settings as $setting){
			 if(!empty($result[$setting->id])){				 
				 $rs = $result[$setting->id];
					// return $rs["text"];
					$setting->text = $rs["text"];
					$setting->font = $rs["font"];
					$setting->type_id = $rs["type_id"];
					$setting->centerX = 125;  //$rs["centerX"];
					$setting->centerY = 125;  //$rs["centerY"];
					$setting->radiusX = $rs["radiusX"];
					$setting->radiusY = $rs["radiusX"];
					$setting->angleStart = $rs["angleStart"];
					$setting->angleEnd = $rs["angleStart"] + $rs["spacing"];
					$setting->spacing = $rs["spacing"];
					$setting->rotate = $rs["rotate"];
					$setting->fontSize = $rs["fontSize"];
					$setting->pathText = $rs["pathText"];
			 }
			 $setting->save(false);
		}
		}  
		return JSON::encode($post);
		Yii::$app->end();
	}
}
