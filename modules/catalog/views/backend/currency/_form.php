<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use app\modules\catalog\models\Language;

/* @var $this yii\web\View */
/* @var $model app\models\Currency */
/* @var $form yii\widgets\ActiveForm */
?>
<section class="section">
    <div class="row">
        <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>
        <div class="card mb-3 col-6 currency-form">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-10">
                        <h3 class="w-75 p-3">Please Fill the form and submit</h3>
                    </div>
                    <div class="col-md-2 float-right">
                        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-lg rounded-pill btn-success' : 'btn btn-lg rounded-pill btn-warning']) ?>
                    </div>
                </div>
                <ul class="nav nav-tabs  nav-fill ml-auto p-0">
                    <?php foreach (Language::suffixList() as $suffix => $name) : ?>
                        <li class="nav-item"><a href="#lang<?= $suffix ?>" class="nav-link <?= empty($suffix) ? ' active' : '' ?>" data-bs-toggle="tab"><?= $name ?></a></li>
                    <?php endforeach; ?>
                    <li class="nav-item"><a href="#main-tab" class="nav-link" data-bs-toggle="tab">Info</a></li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <?php foreach (Language::suffixList() as $suffix => $name) : ?>
                        <div class="tab-pane fade<?php if (empty($suffix)) echo ' show active'; ?>" id="lang<?= $suffix ?>">
                            <?= $form->field($model, 'name' . $suffix)->textInput(['maxlength' => true]) ?>
                            <?= $form->field($model, 'before_name' . $suffix)->textInput(['maxlength' => true]) ?>
                            <?= $form->field($model, 'after_name' . $suffix)->textInput(['maxlength' => true]) ?>
                        </div>
                    <?php endforeach; ?>
                    <div class="tab-pane" id="main-tab">
                        <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'rate')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'primary')->textInput() ?>

                        <?= $form->field($model, 'position')->textInput() ?>

                        <?= $form->field($model, 'enabled')->checkbox() ?>
                    </div>
                </div>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</section>