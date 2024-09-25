<?php
use yii\helpers\Url;
/**
 * @var $this yii\web\View
 */

$this->title = Yii::t('app', 'File Manager');

$this->params['breadcrumbs'][] = $this->title;

?>

<?php echo alexantr\elfinder\ElFinder::widget([
    'connectorRoute' => Url::to('connector'),
    'settings' => [
        'height' => '500px',
        'width' => '100%'
    ],
    'buttonNoConflict' => true,
]) ?>