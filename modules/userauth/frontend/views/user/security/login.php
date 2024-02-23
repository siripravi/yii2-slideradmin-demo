<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use siripravi\authhelper\helpers\FeatureHelper;
use siripravi\authhelper\widgets\Connect;
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/**
 * @var yii\web\View                   $this
 * @var siripravi\authhelper\models\LoginForm $model
 * @var siripravi\authhelper\Module           $module
 */

$this->title = Yii::t('user', 'Sign in');
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="mt-5 p-2 p-md-4 p-xl-5">
    <div class="container-fluid d-flex justify-content-center align-items-center">
        <div class="row col-md-6 d-flex align-items-center">
            <div class="col-12">
                <div class="mb-2 text-center">
                    <h2>Log in</h2>
                </div>
                <div class="col-12">
                    <?php if (FeatureHelper::isRegistrationEnabled()) : ?>
                        <p class="mb-6 d-flex justify-content-center">
                            Not a member yet? <?= Html::a(Yii::t('user', 'Register now!'), ['/user/registration/register'], ['class' => 'ps-2 link-secondary text-decoration-none']) ?>
                        </p>
                    <?php endif ?>
                </div>
            </div>
            <div class="col-12 pt-4">
                <?php $form = ActiveForm::begin([
                    'id'                     => 'login-form',
                    'enableAjaxValidation'   => true,
                    'enableClientValidation' => false,
                    'validateOnBlur'         => false,
                    'validateOnType'         => false,
                    'validateOnChange'       => false,
                    //  'layout' => 'horizontal',
                    'fieldConfig' => [
                        'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
                        /*  'horizontalCssClasses' => [
                            'label' => 'col-sm-4',
                            'offset' => 'col-sm-offset-4',
                            'wrapper' => 'col-sm-8',
                            'error' => '',
                            'hint' => '',
                        ]*/
                    ]
                ]); ?>
                <div class="row gy-3 gy-md-4 overflow-hidden">
                    <div class="col-12">
                        <?= $form->field(
                            $model,
                            'login',
                            ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control', 'tabindex' => '1']]
                        ) ?>
                    </div>
                    <div class="col-12">
                        <?= $form
                            ->field(
                                $model,
                                'password',
                                ['inputOptions' => ['class' => 'form-control', 'tabindex' => '2']]
                            )
                            ->passwordInput()
                            ->label(
                                Yii::t('user', 'Password')
                            ) ?>
                    </div>
                    <div class="col-12">
                        <?= $form->field($model, 'rememberMe')->checkbox(['tabindex' => '4', 'class' => '']) ?>
                        <p class="d-flex justify-content-end">Forgot Password?
                            <?php if ($module->enablePasswordRecovery) : ?>
                                <?= Html::a(
                                    Yii::t('user', 'Click Here'),
                                    ['/user/recovery/request'],
                                    ['tabindex' => '5', 'class' => 'ps-3 link-secondary']
                                ); ?></p>
                    <?php endif; ?>
                    </div>


                    <div class="col-12">
                        <div class="d-grid">
                            <?= Html::submitButton(
                                Yii::t('user', 'Sign in'),
                                ['class' => 'btn bsb-btn-xl btn-primary', 'tabindex' => '3']
                            ) ?>
                        </div>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
            <?= Connect::widget([
                'baseAuthUrl' => ['/user/security/auth'],
            ]) ?>

            <hr class="mt-5 mb-4 border-secondary-subtle">
            <div class=" p-0">
                <div class="d-flex justify-content-start">
                    <?php if (FeatureHelper::isEmailConfirmationEnabled()) : ?>
                        <?= Html::a(Yii::t('user', 'Didn\'t receive confirmation message?'), ['/user/registration/resend']) ?>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</section>