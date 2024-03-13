<?php

use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use app\modules\catalog\models\Language;
/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\bootstrap5\ActiveForm */

if ($model->isNewRecord) {
    $inputTemplate = '{input}';
} else {
    $inputTemplate = <<<HTML
    <div class="input-group">
        {input}
        <span class="input-group-btn">
            <button class="modelValue btn btn-default" type="button"><i class="glyphicon glyphicon-refresh"></i></button>
        </span>
    </div>
HTML;

    $urlModelValue = Url::to(['product/model-value']);
    $script = <<<JS
    $('.modelValue').click(function() {
        var obj = $(this).parents('.input-group').find('.form-control');
        if (obj.attr('disabled') || obj.attr('readonly')) {
            obj.prop('disabled', false);
            obj.prop('readonly', false);
        } else {
            $.get('{$urlModelValue}', { id: {$model->id}, name: obj.attr('name') }, function(data) {
                if (data) {
                    obj.val(data).prop('readonly', true);
                }
            });
        }
    });
JS;
    Yii::$app->view->registerJs($script, yii\web\View::POS_READY);
}
?>
<?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

<div class="card mb-3 col-12 product-form">
    <div class="card-header d-flex p-1">
        <div class="card-title p-3">Fill the Info</div>
        <ul class="nav nav-tabs  nav-fill ml-auto p-0">
            <?php foreach (Language::suffixList() as $suffix => $name) : ?>
                <li class="nav-item"><a href="#lang<?= $suffix ?>" class="nav-link <?= empty($suffix) ? ' active': '' ?>" data-bs-toggle="tab"><?= $name ?></a></li>
            <?php endforeach; ?>
            <li class="nav-item"><a href="#main-tab" class="nav-link" data-bs-toggle="tab">Main</a></li>
        </ul>
        <div class="form-groupd-grid gap-2 col-4 mx-auto pt-3">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-info' : 'btn btn-info']) ?>
        </div>
    </div>
    <div class="card-body">
        <div class="tab-content">
            <?php foreach (Language::suffixList() as $suffix => $name) : ?>
                <div class="tab-pane fade<?php if (empty($suffix)) echo ' show active'; ?>" id="lang<?= $suffix ?>">
                <?= $form->field($model, 'name' . $suffix, ['inputTemplate' => $inputTemplate])
                    ->textInput(['maxlength' => true, 'disabled' => (isset($model->nullAttributes['name' . $suffix])) ? true : false]) ?>

                <?= $form->field($model, 'title' . $suffix, ['inputTemplate' => $inputTemplate])
                    ->textInput(['maxlength' => true, 'disabled' => (isset($model->nullAttributes['title' . $suffix])) ? true : false]) ?>

                <?= $form->field($model, 'keywords' . $suffix, ['inputTemplate' => $inputTemplate])->textInput(['maxlength' => true, 'disabled' => (isset($model->nullAttributes['keywords' . $suffix])) ? true : false]) ?>

                <?= $form->field($model, 'description' . $suffix, ['inputTemplate' => $inputTemplate])->textarea(['disabled' => (isset($model->nullAttributes['description' . $suffix])) ? true : false]) ?>

                <?= $form->field($model, 'text' . $suffix, ['inputTemplate' => $inputTemplate])->textarea(['disabled' => (isset($model->nullAttributes['text' . $suffix])) ? true : false]) ?>
                </div>
            <?php endforeach; ?>
            <div class="tab-pane" id="main-tab">
            <?= $form->field($model, 'brand_id', ['inputTemplate' => $inputTemplate])
        ->dropDownList(\app\models\Brand::list(), ['disabled' => (isset($model->nullAttributes['brand_id'])) ? true : false]) ?>

    <?= $form->field($model, 'slug', ['inputTemplate' => $inputTemplate])
        ->textInput(['maxlength' => true, 'disabled' => (isset($model->nullAttributes['slug'])) ? true : false]) ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'old_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'currency_id')->dropDownList(\app\models\Currency::list()) ?>

    <?= $form->field($model, 'available')->textInput() ?>

    <?= $form->field($model, 'position')->textInput() ?>

    <?= $form->field($model, 'enabled')->checkbox() ?>
            </div>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>
