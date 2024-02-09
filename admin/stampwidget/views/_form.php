<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use kartik\range\RangeInput;
use app\stampwidget\helpers\AjaxCreate;
use yii\helpers\Url;
use yii\helpers\JSON;
?>
<?php 
$svgFont = new app\stampwidget\helpers\SVGFont();
	//echo Yii::getAlias("@webroot")."/css/Magnolia-Script.svg"; die;
$svgFont->load(Yii::getAlias("@webroot")."/css/Averia-Regular.svg");
$result = $svgFont->textToPaths("Simple text", 20);
//echo "<pre>"; print_r($layers);
$initPath =  "M 150, 150 m -120, 0 a 120,120 0 0,1 240,0 a 120,120 0 0,1 -240,0";
$charPath = [];  $arr = [];
foreach($layers as $index => $layer){
	$arr[$layer->id] = JSON::decode($layer->pathText);
	
	if(!empty($arr[$layer->id])){
		foreach($arr[$layer->id] as $i => $a){
	$trans = "translate(" . $a[0] . "," . $a[1] .") " . "rotate(" . $a[2] ." )";
	$charPath[$layer->id.$i] = $trans;
		}
	}
	
}  
//echo '<pre>';print_r($charPath); die;
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
	  
	  <?php
		echo $form->field($layer, "[$index]angleStart")->label("")->hiddenInput(['class'=>'tangles']);
	  ?>  
	  <?php
		echo $form->field($layer, "[$index]pathText")->label("")->hiddenInput(['class'=>'tpathtext']);
	  ?> 
     <div class="row align-items-start">
    <div class="col-sm-10">
      <?= 
		$form->field($layer, "[$index]text")->textInput(['class'=>'form-control input-sm ttext'])->label("Text");
		?>
    </div>
    <!--<div class="col-sm-6">
      <= 
		$form->field($layer, "[$index]font")->textInput(['class'=>'form-control input-sm tfont'])->label("Font");
		?>
    </div> -->
    </div>
	<div class="row">
       <?php 	 
		echo $form->field($layer, "[$index]spacing")->label("Letter Spacing")->widget(RangeInput::classname(), [ 'size' => 'sm',			
			'html5Container' => ['style' => 'width:235px'],
			 'html5Options' => ['min'=>0, 'max'=>359, 'step'=>1,'class' => 'tspacing'],			
			
     ]);  ?>		
    
    </div>
	<div class="row align-items-start">
    <div class="col-sm-10">
	  <?= $form->field($layer, "[$index]type_id")->dropDownList(
                 $types,['prompt'=>'Please select' ,'class'=>'form-control input-sm ttype'])->label("");?>
      <!--php 	 
		echo $form->field($layer, "[$index]centerX")->label("Center-X")->widget(RangeInput::classname(), [ 'size' => 'sm',			
			'html5Container' => ['style' => 'width:235px'],
			 'html5Options' => ['min'=>0, 'max'=>250, 'step'=>1,'class' => 'tcenterx'],			
			
     ]);		
		?-->
    </div>
    <div class="col-sm-6">
	<?= 
		$form->field($layer, "[$index]font")->textInput(['class'=>'form-control input-sm tfont'])->label("Font");
		?>
	  
      <!--php 	 
		echo $form->field($layer, "[$index]centerY")->label("Center-Y")->widget(RangeInput::classname(), [ 'size' => 'sm',			
			'html5Container' => ['style' => 'width:150px'],
			 'html5Options' => ['min'=>0, 'max'=>350, 'step'=>1,'class' => 'tcentery'],			
			
     ]);
		
		-->
    </div>
    </div>
    <div class="row align-items-start">
    <div class="col-sm-10">
	  <?php 
		echo $form->field($layer, "[$index]fontSize")->label("Text Size")->widget(RangeInput::classname(), [ 'size' => 'sm',
        'options' => ['placeholder' => ''],    
			'html5Container' => ['style' => 'width:150px'],
			 'html5Options' => ['min'=>16, 'max'=>48, 'step'=>1,
			 'class' => 'tfontsz'],
			//'addon' => ['append'=>['content'=>'px']]
		]);
	
		?>
     
    </div>
    <div class="col-sm-6">
      <!--php 	 
		echo $form->field($layer, "[$index]angleEnd")->label("End Angle")->widget(RangeInput::classname(), [ 'size' => 'sm',			
			'html5Container' => ['style' => 'width:150px'],
			 'html5Options' => ['min'=>0, 'max'=>360, 'step'=>1,'class' => 'tanglee'],			
			
     ]);
		
		-->
		 <!--?php 	 
		echo $form->field($layer, "[$index]angleStart")->label("Start Angle")->widget(RangeInput::classname(), [ 'size' => 'sm',			
			'html5Container' => ['style' => 'width:235px'],
			 'html5Options' => ['min'=>1, 'max'=>359, 'step'=>1,'class' => 'tangles'],		
			
     ]);
		
		?-->
    </div>
    </div>		
    <div class="row align-items-start">
    <div class="col-sm-10">
      <?php 	 
		echo $form->field($layer, "[$index]radiusX")->label("Radius-X")->widget(RangeInput::classname(), [ 'size' => 'sm',			
			'html5Container' => ['style' => 'width:235px'],
			 'html5Options' => ['min'=>20, 'max'=>120, 'step'=>1,'class' => 'tradiusx'],			
			
     ]);
		
		?>
    </div>
    <!--<div class="col-sm-6">
      <php 	 
		echo $form->field($layer, "[$index]radiusY")->label("Radius-Y")->widget(RangeInput::classname(), [ 'size' => 'sm',			
			'html5Container' => ['style' => 'width:150px'],
			 'html5Options' => ['min'=>50, 'max'=>150, 'step'=>1,'class' => 'tradiusy'],			
			
     ]);
		
		>
    </div>-->
    </div>	
	<div class="row align-items-start">
    <div class="col-sm-10">
      <?php 	 
		echo $form->field($layer, "[$index]rotate")->label("Rotate")->widget(RangeInput::classname(), [ 'size' => 'sm',			
			'html5Container' => ['style' => 'width:235px'],
			 'html5Options' => ['min'=>0, 'max'=>359, 'step'=>1,'class' => 'trotate'],			
			
     ]);
		
		?>
    </div>
    
    </div>
	
    </div>  <!--  tab end -->
	
	
    <?php endforeach;?>
<?php ActiveForm::end();  ?>
</div>
 
<div class="description" style="width:40%">  
<span id="path1"></span> &nbsp;<hr><span id="path2"></span>
 <svg class="draggables" xmlns:osb="http://www.openswatchbook.org/uri/2009/osb" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:cc="http://creativecommons.org/ns#" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" id="h-o-l-ds" width="250" height="250" viewBox="0 0 250 250" version="1.1" style="display: inline;" sodipodi:docname="cons_stamp.svg" inkscape:version="1.0.2-2 (e86c870879, 2021-01-15)">
	    <style type="text/css">
			<![CDATA[
			  .red {fill: #b1bd8c; }
			 
			  .y567 { stroke-linecap: round }
			]]>
		</style>
	 <defs>  
	  <g id="GrpText1"
		 layer="1"
		 font-size="14"
		 font-style="normal"
		 font-family="Arial"
		 fill="#000"
		 stroke="none"
		 position="absolute"
		 font-weight="normal"
		 in="0"
		 rad="116"
		 cut="-90"
		 len="192"
		> 
		<pattern id="smallGrid" width="8" height="8" patternUnits="userSpaceOnUse">
			<path d="M 8 0 L 0 0 0 8" fill="none" stroke="gray" stroke-width="0.5"/>
		</pattern>
		<pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse">
			<rect width="40" height="40" fill="url(#smallGrid)"/>
			<path d="M 40 0 L 0 0 0 40" fill="none" stroke="gray" stroke-width="1"/>
		</pattern>
	</defs>
	 <symbol viewBox="0 0 16 16" id="icon-star">
        <path d="M16 6.216l-6.095-.02L7.98.38 6.095 6.196 0 6.215h.02l4.912 3.57-1.904 5.834h.02l4.972-3.59 4.932 3.59-1.904-5.815L16 6.215" />
    </symbol>
   <!--  <use class="red" xlink:href="#icon-star"/>	-->
   <!-- <rect width="100%" height="100%" fill="url(#grid)" />	-->
	<circle class="Rang" layer="0" id="Rang0" cx="125" cy="125" r="123" fill="none" stroke="#2f69c2" stroke-width="2"></circle>
    	</g>
    <?php foreach ($layers as $index => $layer):?>	 
    <g id="RangText<?= $layer['id'];?>" layer="<?= $index;  ?>" font-size="<?= $layer['fontSize'];?>px" font-style="bold" font-family="<?= $layer['font'];?>" fill="#000" stroke="#000" font-weight="normal">
	<?php foreach (str_split($layer['text']) as $i => $t):  ?>
	  <?php $cPath = (!empty($charPath[$layer['id'].$i])) ? $charPath[$layer['id'].$i] : "";  ?>
	<text id="txt<?= $layer['id'].$i;?>" transform="<?= $cPath;?>"><tspan id="tsp<?= $layer['id'].$i;?>"><?= $t;?></tspan></text>
    <?php endforeach; ?> 
   </g>	
	<?php endforeach; ?>

	<g class="draggable" id="star1" transform="translate(50,220)" data-dragstyle="slippery" data-slip-radius="20">
	  <g transform="translate(-38.25,-170.43)">
	    <path d="M16,22.375L7.116,28.83l3.396-10.438l-8.883-6.458l10.979,0.002L16.002,1.5l3.391,10.434h10.981l-8.886,6.457l3.396,10.439L16,22.375L16,22.375z" />
	  </g>
	</g>
	<g class="draggable" id="star2" transform="translate(240,220)" data-dragstyle="slippery" data-slip-radius="20">
	  <g transform="translate(-38.25,-170.43)">
	    <path d="M16,22.375L7.116,28.83l3.396-10.438l-8.883-6.458l10.979,0.002L16.002,1.5l3.391,10.434h10.981l-8.886,6.457l3.396,10.439L16,22.375L16,22.375z" />
	  </g>
	</g>  
	</svg>	
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
	
</div>
<svg width="400px" height="200px"> 
 <text x="1em, 2em, 3em, 4em, 5em" y="3em, 4em, 5em">
    Individually Spaced Text
  </text>
</svg>
 <div id="notepad"></div>  <div id="canvas"></div>
