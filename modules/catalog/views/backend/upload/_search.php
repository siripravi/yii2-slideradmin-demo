<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\catalog\models\backend\UploadSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="upload-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'file_id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'dir') ?>

    <?= $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'tmp') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
