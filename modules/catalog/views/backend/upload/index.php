<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\catalog\models\backend\UploadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Uploads');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="upload-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Upload'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'file_id',
            'user_id',
            'dir',
            'name',
            // 'tmp',
            // 'created_at',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {open} {update} {delete}',
                'buttons' => [
                    'open' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-download"></span>', $model->link, ['target' => '_blank']);
                    }
                ]
            ],
        ],
    ]); ?>
</div>
