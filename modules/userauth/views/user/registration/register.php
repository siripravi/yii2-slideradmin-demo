<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var \yii\web\View $this
 * @var \app\models\User $model
 * @var \app\models\Profile $profile
 *
 */

?>
<section class="p-3 p-md-4 p-xl-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 bsb-tpl-bg-platinum">
                <div class="d-flex flex-column justify-content-between h-100 p-3 p-md-4 p-xl-5">
                    <h3 class="m-0">Welcome!</h3>
                    <img class="img-fluid rounded mx-auto my-4" loading="lazy" src="./assets/img/bsb-logo.svg" width="245" height="80" alt="BootstrapBrain Logo">

                    <p class="mb-0">
                        Already a member ? <?= Html::a(Yii::t('user', 'Login'), ['/user/security/login'], ['class' => 'link-secondary text-decoration-none']) ?>
                    </p>
                </div>
            </div>
            <div class="col-12 col-md-6 bsb-tpl-bg-lotion">
                <div class="p-3 p-md-4 p-xl-5">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-5">
                                <h3>New User? SignUp</h3>
                            </div>
                        </div>
                    </div>
                    <?php $form = ActiveForm::begin([
                        'enableClientValidation' => true,
                        'enableAjaxValidation' => true
                    ]) ?>
                    <div class="row gy-3 gy-md-4 overflow-hidden">

                        <div class="col-12">
                            <?= $form->field($model, 'email', [
                                'inputOptions' => [
                                    'class' => 'form-control',
                                    'autofocus' => '',
                                    'tabindex' => 1
                                ]
                            ])->textInput(['type' => 'email']) ?>
                        </div>
                        <div class="col-12">
                            <?= $form->field($model, 'password', [
                                'inputOptions' => [
                                    'class' => 'form-control',
                                    'autofocus' => '',
                                    'tabindex' => 3
                                ]
                            ])
                                ->passwordInput()
                                ->label(Yii::t('app', 'Password')) ?>
                        </div>

                        <br>
                        <!--surname-->
                        <div class="col-12">
                            <?= $form->field($profile, 'surname', [
                                'inputOptions' => [
                                    'class' => 'form-control',
                                    'autofocus' => '',
                                    'tabindex' => 5
                                ]
                            ]) ?>
                        </div>
                        <!--NAME-->
                        <div class="col-12">
                            <?= $form->field($profile, 'name', [
                                'inputOptions' => [
                                    'class' => 'form-control',
                                    'autofocus' => '',
                                    'tabindex' => 4
                                ]
                            ]) ?>
                        </div>
                        <!--patronymic-->
                        <div class="col-12">
                            <?= $form->field($profile, 'patronymic', [
                                'inputOptions' => [
                                    'class' => 'form-control',
                                    'autofocus' => '',
                                    'tabindex' => 4
                                ]
                            ]) ?>
                        </div>
                        <!--phone-->
                        <div class="col-12">
                            <?= $form->field($profile, 'phone', [
                                'inputOptions' => [
                                    'class' => 'form-control',
                                    'autofocus' => '',
                                    'tabindex' => 6
                                ]
                            ]) ?>
                        </div>

                        <div class="col-12">
                            <div class="d-grid">
                                <?= Html::submitButton(
                                    Yii::t('user', 'Sign Up'),
                                    ['class' => 'btn bsb-btn-xl btn-primary', 'tabindex' => '3']
                                ) ?>
                            </div>
                        </div>
                    </div>
                    <?php $form->end() ?>
                    <div class="m-t-20">
                        <p class="text-center">

                        </p>
                        <p class="text-center">
                            <?= Html::a(Yii::t('app', 'Didn\'t receive confirmation message?'), ['/user/registration/resend']) ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>