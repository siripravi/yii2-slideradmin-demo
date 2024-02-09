<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use kartik\range\RangeInput;
use app\stampwidget\helpers\AjaxCreate;
use yii\helpers\Url;
?>
<?php 
$svgFont = new app\stampwidget\helpers\SVGFont();
	//echo Yii::getAlias("@webroot")."/css/Magnolia-Script.svg"; die;
$svgFont->load(Yii::getAlias("@webroot")."/css/Averia-Regular.svg");
$result = $svgFont->textToPaths("Simple text", 20);

?>
<style>
      #xcontainer {
        margin: auto;
        width: 800px;
      }

      svg {
        width: 100%;
        min-height: 600px;
      }

      .arc-path {
        visibility: hidden;
      }

      circle {
       /* stroke: none;  */
      }
    </style>
<div class="general">
<?php $form = ActiveForm::begin(['action' => ['update'],
               'options' => ['id' => 'dynamic-form111','class'=>'my__form form-row mt-5']]);  ?>
 <input type="hidden" name="_csrf" id="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>">

<?php foreach ($layers as $index => $layer):?>
	  	   <div class="tab-pane fade" id="L<?=$layer->id;?>" aria-labelledby="L<?= $layer->id;?>-tab">
	  
			<?= Html::a('<i class="fa fa-remove"></i>', ['site/delete-layer', 'id' => $layer->id], [
                'class' => 'xcontrol-icon',
                'data-confirm' => 'Are you sure?',
                'data-method' => 'post',
            ]) ?>	
			
	  <?php
		echo $form->field($layer, "[$index]id")->label("")->hiddenInput();
		?>  
		
	<div class="row align-items-start">
    <div class="col-sm-6">
      <?= 
		$form->field($layer, "[$index]text")->textInput(['class'=>'form-control input-sm ttext'])->label("Text");
		?>
    </div>
    <div class="col-sm-6">
      <?= 
		$form->field($layer, "[$index]font")->textInput(['class'=>'form-control input-sm tfont'])->label("Font");
		?>
    </div>
    </div>	
	<div class="row align-items-start">
    <div class="col-sm-6">
      <?= $form->field($layer, "[$index]type_id")->dropDownList(
                 $types,['prompt'=>'Please select' ,'class'=>'form-control input-sm ttype']);?>
    </div>
    <div class="col-sm-6">
      <?php 	 
		echo $form->field($layer, "[$index]radius")->label("Radius")->widget(RangeInput::classname(), [ 'size' => 'sm',			
			'html5Container' => ['style' => 'width:150px'],
			 'html5Options' => ['min'=>70, 'max'=>150, 'step'=>1,'class' => 'tradius'],			
			
     ]);
		
		?>
    </div>
    </div>	
	<div class="row align-items-start">
    <div class="col-sm-6">
      <?php 
		echo $form->field($layer, "[$index]fontSize")->label("Text Size")->widget(RangeInput::classname(), [ 'size' => 'sm',
        'options' => ['placeholder' => ''],    
			'html5Container' => ['style' => 'width:150px'],
			 'html5Options' => ['min'=>16, 'max'=>100, 'step'=>1,
			 'class' => 'tfontsz'],
			//'addon' => ['append'=>['content'=>'px']]
		]);
	
		?>
    </div>
    <div class="col-sm-6">
      <?php 
			echo $form->field($layer, "[$index]spacing")->label("Spacing")->widget(RangeInput::classname(), [ 'size' => 'sm',
    'options' => ['placeholder' => ''],
    'html5Container' => ['style' => 'width:150px', ],	
			 'html5Options' => ['min'=>0, 'max'=>1, 'step'=>0.01,'class' => 'tspacing'],
			//'addon' => ['append'=>['content'=>'px']]
		]);	
		?>
    </div>
    </div>	
	<div class="row align-items-start">
    <div class="col-sm-6"> 
      <?php 
		
		echo $form->field($layer, "[$index]angleStart")->label("Rotate")->widget(RangeInput::classname(), [ 'size' => 'sm',
    'options' => ['placeholder' => '',],
   
			'html5Container' => ['style' => 'width:150px'],
			 'html5Options' => ['min'=>-90, 'max'=>270, 'step'=>1,'class' => 'tanglest'],
			//'addon' => ['append'=>['content'=>'px']]
		]);
       
	?>
    </div>
	
    <div class="col-sm-6">
       <div class="control control-delete-frame ">
		
		</div>
    </div>
  </div>	
	 <div class="input-group justify-content-start">
	 
	 </div>
	  </div>
    <?php endforeach;?>
	 
</div>
 
<div class="description">
  <canvas  width="340" height="340" id="stampDesign" class=" x-draggable" style="background-image:url(<?php echo Yii::getAlias('@web').'/images/circle71.png';?>);" ></canvas>
  
<!-- <svg xmlns="http://www.w3.org/2000/svg" 
   xmlns:xlink="http://www.w3.org/1999/xlink"  
   xmlns:dc="http://purl.org/dc/elements/1.1/"
   xmlns:cc="http://creativecommons.org/ns#"
   xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
   xmlns:svg="http://www.w3.org/2000/svg"  
   xmlns:xlink="http://www.w3.org/1999/xlink"
   xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
   xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
   preserveAspectRatio="xMinYMin meet"
   shape-rendering="geometricPrecision" 
   text-rendering="geometricPrecision" 
   image-rendering="optimizeQuality" 
   width="266px"
   height="266px"
   version="1.1"
   viewBox="0 0 266 266"  
   sodipodi:docname="round_stamp.svg"
   inkscape:version="1.0.2-2 (e86c870879, 2021-01-15)"
   id="round_stamp"> 
<defs>  
    <php foreach ($layers as $index => $layer):
        $pId = "P".$layer["id"];
    >
    <= Html::tag("path","",[
			"d" =>"M100,37c34.8,0,63,28.2,63,63s-28.2,63-63,63s-63-28.2-63-63S65.2,37,100,37z",
			"id"=>$pId]);
	>
	<php endforeach; ?> 
    
</defs>

<= $result;  ?>

    <php foreach ($layers as $index => $layer):
         $pId = "#P".$layer["id"];	$tId = "T".$layer["id"];
	     $len = strlen($layer['text'])*10; ?>
	   <= Html::beginTag("text",["dx" =>$layer['angleStart'],"textLength"=>$len * 10 + $layer['spacing'],"id"=>$tId,"lengthAdjust" =>"spacing"]);?>
	   
	     <= Html::tag("textPath",$layer['text'],["xlink:href" =>$pId,"class"=>"xcoffee"]);?>
	   
	   <= Html::endTag("text"); ?>
	 <php endforeach; ?>  
</svg> 

-->
</div>

<font>
  <font-face font-family="Super Sans" />
 </font>
<text font-family="Super Sans">My text uses Super Sans</text>

<div class="buttons-wrapper">
    <button title="Export" class="btn btn-sm" onclick="download_image()" > 
		<i class="fa fa-download"></i>
    </button> 
    <div class="next">
        <?= Html::submitButton(Yii::t('project', 'Next')) ?>
    </div>
	 <?php
					  AjaxCreate::begin();
					echo Html::button('<span class="fa fa-plus"></span>', [
						'data-href' => Url::toRoute(['create']),
						'class' => 'btn btn-success',
					]);
					AjaxCreate::end();
					?>
</div>
<?php ActiveForm::end();  ?>