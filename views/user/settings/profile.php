<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var app\modules\user\models\Profile $model
 */

$this->title = Yii::t('app', 'Profile settings');
$this->params['breadcrumbs'][] = $this->title;
?>

<!--= $this->render('/_alert', ['module' => Yii::$app->getModule('user')]) ?-->
<section class="mt-5 p-2 p-md-4 p-xl-5">
    <div class="container-fluid d-flex justify-content-center align-items-center">
        <div class="row col-md-6 d-flex align-items-center">

            <?= $this->render('_menu') ?>

            <div class="col-md-12">

                <h3><?= Html::encode($this->title) ?></h3>

                <?php $form = ActiveForm::begin([
                    'id' => 'profile-form',
                    'options' => ['class' => 'form-horizontal'],
                    'fieldConfig' => [
                        'template' => "{label}\n<div class=\"col-lg-9\">{input}</div>\n<div class=\"col-sm-offset-3 col-lg-9\">{error}\n{hint}</div>",
                        'labelOptions' => ['class' => 'col-lg-3 control-label'],
                    ],
                    'enableAjaxValidation'   => true,
                    'enableClientValidation' => false,
                    'validateOnBlur'         => false,
                ]); ?>

                <?= $form->field($model, 'name') ?>
                <?= $form->field($model, 'surname') ?>
                <?= $form->field($model, 'patronymic') ?>
                <?= $form->field($model, 'phone')
                    ->widget(\yii\widgets\MaskedInput::className(), ['mask' => '(999)-999-99-99']); ?>

                <div class="form-group">
                    <div class="col-lg-offset-3 col-lg-9">
                        <?= \yii\helpers\Html::submitButton(
                            Yii::t('app', 'Save'),
                            ['class' => 'btn btn-block btn-success']
                        ) ?><br>
                    </div>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</section>