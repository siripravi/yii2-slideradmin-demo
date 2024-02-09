
<div class="general">
<?php $form = ActiveForm::begin(['action' => ['update'],
               'options' => ['id' => 'dynamic-form111','class'=>'my__form form-row mt-5']]);  ?>
 <input type="hidden" name="_csrf" id="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>">

<?php foreach ($layers as $index => $layer):?>
	  	   <div class="tab-pane fade" id="L<?=$layer->id;?>" aria-labelledby="L<?= $layer->id;?>-tab">
	    <div class="panel panel-primary">
		
	    <div class="panel-header">
			<?= Html::a('<i class="fa fa-remove"></i>', ['site/delete-layer', 'id' => $layer->id], [
                'class' => 'xcontrol-icon',
                'data-confirm' => 'Are you sure?',
                'data-method' => 'post',
            ]) ?>	
			
	  <?php
		echo $form->field($layer, "[$index]id")->label("")->hiddenInput();
		?>  </div>
		<div class="panel-body">
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
	  /*echo $form->field($layer, "[$index]radius")->widget(NumberInput::className(),['clientOptions' => ['min' => 70, 'max' => 400],'options' => ['placeholder' => '','class'=>'tradius']]);*/
		echo $form->field($layer, "[$index]radius")->label("Radius")->widget(RangeInput::classname(), [ 'size' => 'sm',			
			'html5Container' => ['style' => 'width:150px'],
			 'html5Options' => ['min'=>70, 'max'=>150, 'step'=>1,'class' => 'tradius'],
			//'addon' => ['append'=>['content'=>'mm']]
			
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
	  
        <img id="bgimage" style="display:none;" src="<?php echo Yii::getAlias('@web').'/images/canvas.svg';?>" />
	 </div>
         </div>
      </div>
	  </div>
    <?php endforeach;?>
	 
</div>
<div class="description">
 <canvas width="340" height="340" id="stamp" class=" x-draggable" style="background-image:url(<?php echo Yii::getAlias('@web').'/images/circle71.png';?>);" ></canvas>  
</div> 
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