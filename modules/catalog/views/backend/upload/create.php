<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Upload */

$this->title = Yii::t('app', 'Create Upload');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Uploads'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="upload-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
