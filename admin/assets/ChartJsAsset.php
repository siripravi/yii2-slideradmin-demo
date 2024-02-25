<?php
namespace app\admin\assets;

use yii\web\AssetBundle;

/**
 * sb-StylishPortofolio AssetBundle
 */
class ChartJsAsset extends AssetBundle
{
    public $sourcePath='@bower/startbootstrap-sb-admin-2';
    public $baseUrl = '@web';
    
    public $css=[
    ];
    
    public $js=[
        'vendor/chart.js/Chart.min.js'
    ];
    
    public $depends = [
        'yii\bootstrap5\BootstrapPluginAsset',
    ];
    
    public function init() {
        parent::init();
    }
}