<?php
namespace app\admin\assets;
class MainAsset extends \yii\web\AssetBundle
{
	//public $sourcePath = __DIR__ . '/dist';
	//public $baseUrl = '@web';

	public $js = [
		'assets/dist/app.min.js',
		'assets/dist/ajaxcreate.js',
		'@bower/jquery-form/dist/jquery.form.min.js',
		//'assets/dist/sidebar.js'
	];

	public $css = [
		'app.min.css',
		'app-dark.min.css',
	];

	public $publishOptions = [];

	public $depends = [
		\yii\web\JqueryAsset::class,
		'yii\widgets\PjaxAsset',
		//'app\admin\assets\AjaxFormAsset',
	];

	public function init()
    {   
        // Base path of current widget
        $this->sourcePath = __DIR__.'/dist' ;
        parent::init();
    }
}