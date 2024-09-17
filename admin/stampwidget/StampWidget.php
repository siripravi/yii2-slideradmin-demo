<?php

namespace app\admin\stampwidget;
use yii;
use yii\base\Widget;
use yii\helpers\Html;
use yii\base\DynamicModel;
use yii\helpers\ArrayHelper;
use app\models\Layer;
use app\models\LayerType;;
use yii\helpers\Json;
use yii\widgets\Pjax;

use yii\bootstrap\Modal;
use app\admin\stampwidget\assets\StampWidgetAsset;
//use app\admin\stampwidget\assets\AjaxCreateAsset;

class StampWidget extends Widget
{
    public $model;
	public $layers = [];
	public $layerData = [];
	public $layerMaxCount = 5;
    public $key;
    public function init()
    {
        parent::init();
		$session = Yii::$app->session;       
        $this->key = !empty($session->get('wgt_key')) ? $session->get('wgt_key') : Layer::generateSecret();
		
    }

	public function getLayers() {
        $sql = "SELECT
                        id, text,type_id, angleStart,angleEnd, rotate, centerX, centerY, font,fontSize,spacing,radiusX, radiusY ,pathText                   
                        FROM layer
                        where hash = '$this->key' ";

        $layers = Layer::findBySql($sql)->all();
		//"id":232,"text":"Hello World","type_id":1,"angleStart":0,"angleEnd":0,"rotate":0,"centerX":125,"centerY":125,"font":"Arial","fontSize":16,"spacing":180,"radiusX":84,"radiusY":84,"pathText":""
	 
       return $layers;
    }
	
    public function run()
    {       //echo $this->key; die;
        StampWidgetAsset::register($this->getView());
		$session = \Yii::$app->session;
		     
        $imgs = Array(5);
        $imgids = Array();
        $layers = $this->getLayers();
		$session->set($this->key, $layers);
				
        $layerids = array_keys($layers);
        $lays= array_values($layers);
       // echo "<pre>";print_r($layers); die;
        $count = 0;
		$textTypes = LayerType::find()->all();  
		$typeList=ArrayHelper::map($textTypes,'id','name');
        $data = ArrayHelper::map($layers, 'id',function($layer){
           /* return [
                "id"=>$layer->id,
                "text"=>$layer->text,
                "type_id"=>$layer->type_id,
                "angleStart"=>$layer->angleStart,
                 "angleEnd"=>$layer->angleEnd,
                 "rotate"=>$layer->rotate,
                 "centerX"=>$layer->centerX,
                 "centerY"=>$layer->centerY,
                 "font"=>$layer->font,
                 "fontSize"=>$layer->fontSize,
                 "spacing"=>$layer->spacing,
                 "radiusX"=>$layer->radiusX,
                 "radiusY"=>$layer->radiusY,
                 "pathText"=>$layer->pathText
            ];*/
            return $layer;
        });
        return $this->render('stamp', ['layers' => $layers, 'types' =>$typeList,'jslrs' => Json::encode($layers)]);
    }
	
	
	public function addLayer($layer){
		$this->layers[] = $layer;
	}

    public function getViewPath()
    {
        return '@app/admin/stampwidget/views/';
    }
}