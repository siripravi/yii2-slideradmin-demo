<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Brand */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Brand',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Brands'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="brand-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
