<?php

namespace app\admin\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\Layer;
use app\models\LayerType;
use yii\helpers\Json;
class StampController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
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
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

      public function actionDesign(){
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
