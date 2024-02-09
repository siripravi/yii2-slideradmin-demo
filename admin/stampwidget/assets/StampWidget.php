<?php

namespace app\stampwidget;
use yii;
use yii\base\Widget;
use yii\helpers\Html;
use yii\base\DynamicModel;
use yii\helpers\ArrayHelper;
use app\models\Layer;
use app\models\LayerType;;
use yii\helpers\Json;
use yii\widgets\Pjax;

use yii\bootstrap5\Modal;
use app\stampwidget\assets\AjaxCreateAsset;
use app\stampwidget\assets\StampWidgetAsset;
class StampWidget extends Widget
{
    public $model;
	public $layers = [];
	public $layerData = [];
	public $layerMaxCount = 5;
    public $key;
	
	public $charPath = [];
	
    public function init()
    {
        parent::init();
		$session = Yii::$app->session;       
		$this->key = !empty($session['wgt_key'])? $session['wgt_key'] : Layer::generateSecret();
        $this->key = $session['wgt_key'];		
		$session[$this->key] = !empty($session[$this->key])? $session[$this->key] : [];
    }

	public function getLayers() {
        $sql = "SELECT
                        id, text,type_id, angleStart,angleEnd, centerX, centerY, font,fontSize,spacing,radiusX, radiusY ,pathText                     
                        FROM layer
                        where hash = '$this->key' ";

        $layers = Layer::findBySql($sql)->all();
		/*foreach($layers as $layer){
			$layer->pathText = $this->describeArc(0,0,$layer->radius,$layer->angleStart,)
			
		}*/
       /* $data = ArrayHelper::toArray($layers, [
                    'app\modules\image\models\Layer' => [
                        'id',
                        'text',
                        'angleStart',
						'font',
						'fontSize',
						'spacing',
						'radius',
                        'aname' => function ($layer) {
                            return Layer::generateSecret();
                        }
                     
                    ],
        ]);*/           
        return $layers;
    }
	
    public function run()
    {       //echo $this->key; die;
        StampWidgetAsset::register($this->getView());
		$session = \Yii::$app->session;
		     
        $imgs = Array(5);
        $imgids = Array();
        $layers = $this->getLayers();
		$session[$this->key] = $layers;
				
        $layerids = array_keys($layers);
        $lays= array_values($layers);
        //print_r($layers); die;
        $count = 0;
		
		
		$textTypes = LayerType::find()->all();  
		$typeList=ArrayHelper::map($textTypes,'id','name');
        return $this->render('stamp', ['layers' => $layers, 'types' =>$typeList,'jslrs' => Json::encode($session[$this->key])]);
    }
	
	
	public function addLayer($layer){
		$this->layers[] = $layer;
	}

    public function getViewPath()
    {
        return '@app/views/';
    }
	
	
/*public function polarToCartesian(centerX, centerY, radius, angleInDegrees) {
		  var angleInRadians = (angleInDegrees-90) * Math.PI / 180.0;

		  return {
			x: centerX + (radius * Math.cos(angleInRadians)),
			y: centerY + (radius * Math.sin(angleInRadians))
		  };
}

public function describeArc(x, y, radius, startAngle, endAngle){

    var start = polarToCartesian(x, y, radius, endAngle);
    var end = polarToCartesian(x, y, radius, startAngle);

    var largeArcFlag = endAngle - startAngle <= 180 ? "0" : "1";

    var d = [
        "M", start.x, start.y, 
        "A", radius, radius, 0, largeArcFlag, 0, end.x, end.y
    ].join(" ");

    return d;       
}
*/
}