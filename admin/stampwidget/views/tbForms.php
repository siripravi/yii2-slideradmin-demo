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
	<div class="row align-items-start">
    <div class="col-sm-10">
       <?php 	 
		echo $form->field($layer, "[$index]spacing")->label("Letter Spacing")->widget(RangeInput::classname(), [ 'size' => 'sm',			
			'html5Container' => ['style' => 'width:235px'],
			 'html5Options' => ['min'=>0, 'max'=>359, 'step'=>1,'class' => 'tspacing'],			
			
     ]);  ?>
		
    </div>
    
    </div>
	<div class="row align-items-start">
    <div class="col-sm-10">
	  <?= $form->field($layer, "[$index]type_id")->dropDownList(
                 $types,['prompt'=>'Please select' ,'class'=>'form-control input-sm ttype']);?>
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