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
<section class="section">
    <div class="row">
        <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>
        <div class="card mb-3 col-12 product-form">
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
                    <li class="nav-item"><a href="#main-tab" class="nav-link" role="presentation" data-bs-toggle="tab">Info</a></li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content mt-4">
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
    </div>
</section>