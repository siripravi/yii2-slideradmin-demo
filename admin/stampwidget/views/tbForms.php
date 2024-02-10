       <div class="tab-pane fade" id="L<?= $layer->id; ?>" aria-labelledby="L<?= $layer->id; ?>-tab">
       	<?= Html::a('<i class="fa fa-remove"></i>', ['site/delete-layer', 'id' => $layer->id], [
				'class' => 'xcontrol-icon',
				'data-confirm' => 'Are you sure?',
				'data-method' => 'post',
			]) ?>

       	<?php
			echo $form->field($layer, "[$index]id")->label("")->hiddenInput();
			?>

       	<?php
			echo $form->field($layer, "[$index]angleStart")->label("")->hiddenInput(['class' => 'tangles']);
			?>
       	<?php
			echo $form->field($layer, "[$index]pathText")->label("")->hiddenInput(['class' => 'tpathtext']);
			?>
       	<div class="row align-items-start">
       		<div class="col-sm-10">
       			<?=
					$form->field($layer, "[$index]text")->textInput(['class' => 'form-control input-sm ttext'])->label("Text");
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
					echo $form->field($layer, "[$index]spacing")->label("Letter Spacing")->widget(RangeInput::class, [
						'size' => 'sm',
						'html5Container' => ['style' => 'width:235px'],
						'html5Options' => ['min' => 0, 'max' => 359, 'step' => 1, 'class' => 'tspacing'],

					]);  ?>
       		</div>
       	</div>
       	<div class="row align-items-start">
       		<div class="col-sm-10">
       			<?= $form->field($layer, "[$index]type_id")->dropDownList(
						$types,
						['prompt' => 'Please select', 'class' => 'form-control input-sm ttype']
					); ?>       			
       		</div>       	
       	</div>
       	<div class="row align-items-start">
       		<div class="col-sm-10">
       			<?php
					echo $form->field($layer, "[$index]fontSize")->label("Text Size")->widget(RangeInput::class, [
						'size' => 'sm',
						'options' => ['placeholder' => ''],
						'html5Container' => ['style' => 'width:150px'],
						'html5Options' => [
							'min' => 16, 'max' => 48, 'step' => 1,
							'class' => 'tfontsz'
						],
						//'addon' => ['append'=>['content'=>'px']]
					]);

					?>
       		</div>       		
       	</div>
       	<div class="row align-items-start">
       		<div class="col-sm-10">
       			<?php
					echo $form->field($layer, "[$index]radiusX")->label("Radius-X")->widget(RangeInput::class, [
						'size' => 'sm',
						'html5Container' => ['style' => 'width:235px'],
						'html5Options' => ['min' => 20, 'max' => 120, 'step' => 1, 'class' => 'tradiusx'],

					]);

					?>
       		</div>       		
       	</div>
       	<div class="row align-items-start">
       		<div class="col-sm-10">
       			<?php
					echo $form->field($layer, "[$index]rotate")->label("Rotate")->widget(RangeInput::class, [
						'size' => 'sm',
						'html5Container' => ['style' => 'width:235px'],
						'html5Options' => ['min' => 0, 'max' => 359, 'step' => 1, 'class' => 'trotate'],

					]);

					?>
       		</div>
       	</div>
    </div>