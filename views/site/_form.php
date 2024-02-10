<?php
use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
ActiveForm::$autoIdPrefix = 'a';

$form = ActiveForm::begin([
    'layout' => 'horizontal',
]);

$typeList=ArrayHelper::map($types,'id','name');
?>
<?= $form->field($model, 'text')->textInput(['class'=>'in_text','placeholder'=>'Text around the circle'])->label(""); ?>
<!--= $form->field($model, 'type_id')->dropDownList(
$typeList,['prompt'=>'Please select','class'=>'o-f-n-ds' ])->label("");?-->
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>    
<?php ActiveForm::end(); ?>