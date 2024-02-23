<?php

/**
 * @author Albert Gainutdinov <xalbert.einsteinx@gmail.com>
 *
 *  @var \app\models\UserAddress $address
 */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

?>
<section class="mt-5 p-2 p-md-4 p-xl-5">
    <div class="container-fluid d-flex justify-content-center align-items-center">
        <div class="row col-md-6 d-flex align-items-center">
            <h3><?= $this->title; ?></h3>
            <div class="row">
                <?= $this->render('_menu') ?>
                <?php $form = ActiveForm::begin(); ?>
                <?= $form->field($address, 'country') ?>
                <?= $form->field($address, 'region') ?>
                <?= $form->field($address, 'city') ?>
                <?= $form->field($address, 'street') ?>
                <?= $form->field($address, 'house') ?>
                <?= $form->field($address, 'apartment') ?>
                <?= $form->field($address, 'zipcode') ?>
                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</section>