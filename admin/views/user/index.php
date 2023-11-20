<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-8">
<div class="card user-index p-3">
    <div class="card-header">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">    
        <?= Html::a(Yii::t('app', 'Create {0}', Yii::t('app', 'User')), ['create'], ['class' => 'btn btn-success']) ?>
        </div>
    </div>
    
    <p>
    <h1><?= Html::encode($this->title) ?></h1>

    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

            'id',
            'username',
            'email:email',
            'status',
            'created_at:date',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
            ],
        ],
    ]); ?>
</div>
</div>