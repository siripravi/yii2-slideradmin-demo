<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\bootstrap\Alert;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/*
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var app\modules\user\models\RecoveryForm $model
 */

$this->title = Yii::t('app', 'Recover your password');
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="p-3 p-md-4 p-xl-5">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <?php foreach (Yii::$app->session->getAllFlashes() as $type => $message) : ?>
                    <?php if (in_array($type, ['success', 'danger', 'warning', 'info'])) : ?>
                        <?= Alert::widget([
                            'options' => ['class' => 'alert-dismissible alert-' . $type],
                            'body' => $message
                        ]) ?>
                    <?php endif ?>
                <?php endforeach ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                <div class="row">
                    <div class="col-12">
                        <div class="mb-5">
                            <h3><?= Html::encode($this->title) ?></h3>
                        </div>
                    </div>
                </div>
                <?php $form = ActiveForm::begin([
                    'id'                     => 'password-recovery-form',
                    'enableAjaxValidation'   => true,
                    'enableClientValidation' => false,
                ]); ?>
                <div class="row gy-3 gy-md-4 overflow-hidden">
                    <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

                    <?= Html::submitButton(Yii::t('app', 'Continue'), ['class' => 'btn btn-primary btn-block']) ?><br>
                </div>
                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>
</section>