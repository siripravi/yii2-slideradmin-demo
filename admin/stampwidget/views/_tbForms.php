<?php

use yii\helpers\Html;
use kartik\range\RangeInput;

?>
<?= Html::a('<i class="fa fa-remove"></i>Remove', ['site/delete-layer', 'id' => $layer->id], [
	'class' => 'btn btn-success',
	'data-confirm' => 'Are you sure?',
	'data-method' => 'post',
]) ?>
<div class="visually-hidden">
	<?php
	echo $form->field($layer, "[$index]id")->label("")->hiddenInput(['class' => 'visually-hidden']);
	?>
	<?php
	echo $form->field($layer, "[$index]angleStart")->label("")->hiddenInput(['class' => 'tangles visually-hidden']);
	?>
	<?php
	echo $form->field($layer, "[$index]pathText")->label("")->hiddenInput(['class' => 'tpathtext visually-hidden']);
	?>
	<?=
	$form->field($layer, "[$index]font")->textInput(['class' => 'form-control input-sm tfont'])->label("Font");
	?>
	<?php
	echo $form->field($layer, "[$index]fontSize")->label("Text Size")->widget(RangeInput::class, [
		'size' => 'sm',
		'options' => ['placeholder' => '', 'readonly' => true],
		'html5Container' => ['style' => 'width:350px'],
		'html5Options' => [
			'min' => 16, 'max' => 48, 'step' => 1,
			'class' => 'tfontsz'
		],
		//'addon' => ['append'=>['content'=>'px']]
	]);

	?>
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
		<div class="row align-items-start">
			<div class="col-sm-10">
				<!--php 	 
		echo $form->field($layer, "[$index]centerX")->label("Center-X")->widget(RangeInput::class(), [ 'size' => 'sm',			
			'html5Container' => ['style' => 'width:235px'],
			 'html5Options' => ['min'=>0, 'max'=>250, 'step'=>1,'class' => 'tcenterx'],
     		]);		
		?-->
			</div>
		</div>
	</div>
</div> <!-- end of visually hidden  -->
<div class="row align-items-start">
	<div class="col-sm-10">
		<?=
		$form->field($layer, "[$index]text")->textInput(['class' => 'ttext form-control input-sm'])->label("");
		?>
	</div>
</div>
<div class="row align-items-start">
	<div class="col-sm-10">
		<?php
		echo $form->field($layer, "[$index]angleStart")->label("Rotation")->widget(RangeInput::class, [
			'size' => 'sm',
			'html5Container' => ['style' => 'width:235px'],
			'html5Options' => ['min' => 0, 'max' => 359, 'step' => 1, 'class' => 'tanglestart'],

		]);  ?>
	</div>
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
		<?= $form->field($layer, "[$index]type_id")->dropDownList(
			$types,
			['prompt' => 'Please select', 'class' => 'form-control input-sm ttype']
		); ?>
	</div>
</div>