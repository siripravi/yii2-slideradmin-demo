<?php

use yii\web\View;
use yii\helpers\Html;
use yii\bootstrap5\Tabs;

use yii\helpers\Url;
use yii\helpers\Json;

use app\models\Layer;

use kartik\editable\Editable;

use yii\web\JsExpression;
use yii\bootstrap5\ActiveForm;

use kartik\range\RangeInput;
use app\admin\stampwidget\helpers\AjaxCreate;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php $this->registerJs(
	'$("document").ready(function(){
	if (typeof(Storage) !== "undefined") {
				
		var dash_localVar = localStorage.getItem("dash_activ_tab"+getUrlPath());
		if(dash_localVar){

			$(".dashboard_tabs_cl > li").removeClass("active");
			$(".tab-content > div").removeClass("active");

			var hrefAttr = "a[href=\'"+dash_localVar+"\']";
			if( $(hrefAttr).parent() ){
				$(hrefAttr).parent().addClass("active");
				$(""+dash_localVar+"").addClass("active");
			}
				
		}

		$(".dashboard_tabs_cl a").click(function (e) {
			//alert(window.location.pathname);					
			e.preventDefault();
			localStorage.setItem("dash_activ_tab"+getUrlPath(), $( this ).attr( "href" ));
		});
		function getUrlPath(){
			var returnVar = "_indexpg";
			var splitStr = window.location.href;
			var asdf = splitStr.split("?r=");
			if(asdf[1]){
				var furthrSplt = asdf[1].split("&");
				if(furthrSplt[0]){
					returnVar = furthrSplt[0];
				}else{
					returnVar = asdf[1];
				}
			}
			return returnVar;
		}
	}
	});'
); ?>
<script type="text/javascript">
</script>
<?php
$options = [
    'appName' => Yii::$app->name,
    'baseUrl' => Yii::$app->request->baseUrl,
    'language' => Yii::$app->language,
  
];
$this->registerJs(
    "var wscript = ".\yii\helpers\Json::encode($layers).";",
    View::POS_HEAD,
    'wscript'
);
?>
<?php
$session = Yii::$app->session;
echo $session['wgt_key'];
?>
<?php

$lrs = Json::decode($jslrs);
$items = [];
/*foreach ($layers as $index => $layer){
echo "<pre>";print_r($layers);echo "<hr>";
}
*/
?>

<?php $form = ActiveForm::begin([
 /*   'enableClientValidation' => false,
    'enableAjaxValidation' => true,
    'validateOnChange' => true,
    'validateOnBlur' => false,
    'layout' => 'horizontal',*/
    'options' => [
       // 'enctype' => 'multipart/form-data',
        'id' => 'dynamic-form111',
    ]
]); ?>
<?php

foreach ($layers as $index => $layer){
	//print_r($layer);
 $items[] = [	
	'label' => '#Text-'.$layer->id,
	'content' => $this->render("_tbForms", ['layer' => $layer, 'form' => $form,'index'=>$layer->id,'types'=>$types]),
    'options' => ['id' => $layer->id],
];
}
?>

<div class="card card-primary bg-light">
    <div class="row p-2">
        <div class="col-8 justify-content-start">
            <div class="alert alert-light-success color-success"><i class="bi bi-check-circle"></i> Please fill all the
                required information ad click the button on right.
			</div>
        </div>
        <div class="col-4 justify-content-end">
			<?php
			/*	AjaxCreate::begin(
					['optionsModal' => ['class' => 'modal-sm']]
				);
				echo Html::button('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 250 250" width="24px" height="24px" version="1.0" xmlns:xlink="http://www.w3.org/1999/xlink"><path fill="#ffffff" d="M136 153l-37 0 -10 23 -27 0 49 -102 27 0 27 55c-12,5 -22,13 -29,24zm5 -17l-17 -38 -17 38 34 0zm-21 -126c-61,0 -110,50 -110,111 0,61 49,110 110,110 7,0 13,0 20,-2 -7,-6 -12,-14 -16,-23 -1,0 -2,0 -4,0 -47,0 -85,-38 -85,-85 0,-47 38,-85 85,-85 47,0 85,38 85,85 0,1 0,1 0,2 9,3 18,8 24,15 1,-6 2,-12 2,-17 0,-61 -50,-111 -111,-111zm60 140l15 0 0 30 30 0 0 15 -30 0 0 30 -15 0 0 -30 -30 0 0 -15 30 0 0 -28 0 -2zm2 -15c-30,4 -50,30 -46,58 3,27 27,50 58,46 16,-2 27,-10 34,-18 19,-23 15,-57 -6,-74 -11,-9 -24,-14 -40,-12z"></path></svg>', [
					'data-href' => Url::toRoute(['create']),
					'class' => 'btn btn-info',
				]);
				AjaxCreate::end();*/	?>
        </div>
    </div>
    <div class="card-body bg-dark">
		<div class="row">
			<div class="col-6">
				<?php
					echo Tabs::widget([
						'navType' => 'nav-pills',
						'items' => $items,
						'encodeLabels' => false,
						'tabContentOptions' => ['class' => 'card-body p-4'],
						//'itemOptions' => ['class'=>'card-body'],
						//'headerOptions' => ['class'=>'use-max-space']
					]);
				?>
			</div>
			<div class="col-6 bg-light float-right">
				<?= $this->render('_svg', [
									'layers' => $layers,
									'types' => $types
				]) ?>
			</div>
		</div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        *You can fill the form to create text.
    </div>
    <!-- /.card-footer -->
</div>
<!-- /.card -->
<?php ActiveForm::end(); ?>
