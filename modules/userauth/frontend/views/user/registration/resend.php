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
 * @var yii\web\View                    $this
 * @var siripravi\authhelper\models\ResendForm $model
 */

$this->title = Yii::t('user', 'Request new confirmation message');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid d-flex justify-content-center align-items-center" style="height:100vh; overflow:hidden; border: 2px solid red">
    <!-- Inner row, half the width and height, centered, blue border -->
    <div class="row text-center d-flex align-items-center" style="overflow:hidden; width:50vw; height:50vh; border: 1px solid blue">
        <h3><?= Html::encode($this->title) ?></h3>
        <?php $form = ActiveForm::begin([
            'id'                     => 'resend-form',
            'enableAjaxValidation'   => true,
            'enableClientValidation' => false,
        ]); ?>

        <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

        <?= Html::submitButton(Yii::t('user', 'Continue'), ['class' => 'btn btn-primary btn-block']) ?><br>

        <?php ActiveForm::end(); ?>


    </div> <!-- Inner row -->
</div> <!-- Outer container -->