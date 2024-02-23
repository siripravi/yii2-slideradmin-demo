<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/*
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var siripravi\userhelper\models\RecoveryForm $model
 */

$this->title = Yii::t('user', 'Reset your password');
$this->params['breadcrumbs'][] = $this->title;
?>
<section class="p-3 p-md-4 p-xl-5">
    <div class="container">
        <div class="col-12 col-md-6 bsb-tpl-bg-lotion">
            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="mb-5">
                            <h3<?= Html::encode($this->title) ?>< /h3>
                        </div>
                    </div>
                </div>

                <?php $form = ActiveForm::begin([
                    'id'                     => 'password-recovery-form',
                    'enableAjaxValidation'   => true,
                    'enableClientValidation' => false,
                ]); ?>
                <div class="row gy-3 gy-md-4 overflow-hidden">
                    <div class="col-12">
                        <?= $form->field($model, 'password')->passwordInput() ?>
                    </div>
                    <div class="col-12">
                        <?= Html::submitButton(Yii::t('user', 'Finish'), ['class' => 'btn btn-success btn-block']) ?>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</section>