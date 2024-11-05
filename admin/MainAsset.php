<?php
namespace app\admin;
class MainAsset extends \yii\web\AssetBundle
{
	public $sourcePath = __DIR__ . '/assets/dist';
	public $baseUrl = '@web';

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
		'yii\widgets\PjaxAsset',
		//'app\admin\AjaxFormAsset',
	];

	
}