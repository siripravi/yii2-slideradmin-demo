<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var $this  yii\web\View
 * @var $form  yii\widgets\ActiveForm
 * @var $model app\modules\user\models\SettingsForm
 */

$this->title = Yii::t('app', 'Account settings');
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="p-3 p-md-4 p-xl-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 bsb-tpl-bg-platinum">
                <div class="d-flex flex-column justify-content-between h-100 p-3 p-md-4 p-xl-5">
                    <?= $this->render('_menu'); ?>
                </div>
            </div>
            <div class="col-12 col-md-6 bsb-tpl-bg-lotion">
                <div class="p-3 p-md-4 p-xl-5">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-5">
                                <h3>Account Settings</h3>
                            </div>
                        </div>
                    </div>
                    <?php $form = ActiveForm::begin([
                        'id' => 'account-form',
                        'options' => ['class' => 'form-horizontal'],
                        'fieldConfig' => [
                            'template' => "{label}\n<div class=\"col-lg-9\">{input}</div>\n<div class=\"col-sm-offset-3 col-lg-9\">{error}\n{hint}</div>",
                            'labelOptions' => ['class' => 'col-lg-3 control-label'],
                        ],
                        'enableAjaxValidation' => true,
                        'enableClientValidation' => false,
                    ]); ?>
                    <div class="row gy-3 gy-md-4 overflow-hidden">
                        <div class="col-12">
                            <?= $form->field($model, 'email') ?>
                        </div>
                        <div class="col-12">
                            <?= $form->field($model, 'new_password')->passwordInput() ?>
                        </div>
                        <hr>
                        <div class="col-12">
                            <?= $form->field($model, 'current_password')->passwordInput() ?>
                        </div>
                        <div class="form-group">
                            <div class="d-grid">
                                <?= Html::submitButton(
                                    Yii::t('user', 'Change Password'),
                                    ['class' => 'btn bsb-btn-xl btn-primary', 'tabindex' => '3']
                                ) ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>

            </div>
            <div class="row">
                <?php if ($model->module->enableAccountDelete) : ?>
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <h3 class="panel-title"><?= Yii::t('app', 'Delete account') ?></h3>
                        </div>
                        <div class="panel-body">
                            <p>
                                <?= Yii::t('app', 'Once you delete your account, there is no going back') ?>.
                                <?= Yii::t('app', 'It will be deleted forever') ?>.
                                <?= Yii::t('app', 'Please be certain') ?>.
                            </p>
                            <?= Html::a(Yii::t('app', 'Delete account'), ['delete'], [
                                'class' => 'btn btn-danger',
                                'data-method' => 'post',
                                'data-confirm' => Yii::t('app', 'Are you sure? There is no going back'),
                            ]) ?>
                        </div>
                    </div>
                <?php endif ?>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
</section>