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
                        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-lg rounded-pill btn-success' : 'btn btn-lg rounded-pill btn-info']) ?>
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
                <div class="tab-content mt-4">
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
                            ->dropDownList(\app\modules\catalog\models\Brand::list(), ['disabled' => (isset($model->nullAttributes['brand_id'])) ? true : false]) ?>

                        <?= $form->field($model, 'slug', ['inputTemplate' => $inputTemplate])
                            ->textInput(['maxlength' => true, 'disabled' => (isset($model->nullAttributes['slug'])) ? true : false]) ?>

                        <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'old_price')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'currency_id')->dropDownList(\app\modules\catalog\models\Currency::list()) ?>

                        <?= $form->field($model, 'available')->textInput() ?>

                        <?= $form->field($model, 'position')->textInput() ?>

                        <?= $form->field($model, 'enabled')->checkbox() ?>
                    </div>
                </div>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</section>