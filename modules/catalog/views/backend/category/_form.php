<?php

use app\modules\catalog\helpers\CategoryList;
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
use app\modules\catalog\models\Language;
/* @var $this yii\web\View */
/* @var $model app\modules\catalog\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

<div class="card mb-3 col-8 category-form">
    <div class="card-header d-flex p-1">
        <div class="card-title p-3">Fill the Info</div>
        <ul class="nav nav-tabs  nav-fill ml-auto p-0">
            <?php foreach (Language::suffixList() as $suffix => $name) : ?>
                <li class="nav-item"><a href="#lang<?= $suffix ?>" class="nav-link <?= empty($suffix) ? ' active': '' ?>" data-bs-toggle="tab"><?= $name ?></a></li>
            <?php endforeach; ?>
            <li class="nav-item"><a href="#main-tab" class="nav-link" role="presentation" data-bs-toggle="tab">Main</a></li>
        </ul>
        <div class="form-groupd-grid gap-2 col-4 mx-auto pt-3">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-info' : 'btn btn-info']) ?>
        </div>
    </div>
    <div class="card-body">
        <div class="tab-content">
            <?php foreach (Language::suffixList() as $suffix => $name) : ?>
                <div class="tab-pane fade<?php if (empty($suffix)) echo ' show active'; ?>" id="lang<?= $suffix ?>">
                <?= $form->field($model, 'name' . $suffix)->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'title' . $suffix)->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'keywords' . $suffix)->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'description' . $suffix)->textarea() ?>
                <?= $form->field($model, 'text' . $suffix)->textarea() ?>
                </div>
            <?php endforeach; ?>
            <div class="tab-pane" id="main-tab">
            <?php if ($model->id != 1) : ?>
    <?= $form->field($model, 'parent_id')->dropDownList(CategoryList::listTree(), ['options' => [$model->id => ['disabled' => true]]]) ?>
    <?php endif; ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'position')->textInput() ?>

    <?= $form->field($model, 'enabled')->checkbox() ?>
            </div>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>

