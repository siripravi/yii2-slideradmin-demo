<?php
namespace app\admin\assets;
class MainAsset extends \yii\web\AssetBundle
{
	//public $sourcePath = __DIR__ . '/dist';
	//public $baseUrl = '@web';

	public $js = [
		'assets/dist/app.min.js',
	];

	public $css = [
		'app.min.css',
		'app-dark.min.css',
	];

	public $publishOptions = [];

	public $depends = [
		\yii\web\JqueryAsset::class,
	];

	public function init()
    {   
        // Base path of current widget
        $this->sourcePath = __DIR__.'/dist' ;
        parent::init();
    }
}