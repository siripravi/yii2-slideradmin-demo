<?php
namespace app\admin\assets;
use yii\web\AssetBundle;

/**
 * 
 * 
 *  
 */
class SbAdmin2Asset extends AssetBundle
{
    public $sourcePath='@bower/startbootstrap-sb-admin-2';
    public $baseUrl = '@web';
    
    public $css=[
        'vendor/fontawesome-free/css/all.min.css',
        'vendor/fontawesome-free/css/fontawesome.min.css',
        'https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i',
        'css/sb-admin-2.min.css'
    ];
    
    public $js=[
        'vendor/jquery-easing/jquery.easing.min.js',
        'js/sb-admin-2.min.js'
    ];
    
    public $depends = [
        'yii\web\YiiAsset',
       // 'yii\bootstrap5\BootstrapAsset',
        'yii\bootstrap5\BootstrapPluginAsset',
    ];
    
    public function init() {
        parent::init();
    }
}