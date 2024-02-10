<?php

namespace app\admin\stampwidget\assets;

use yii\web\AssetBundle;

class StampWidgetAsset extends AssetBundle
{
    public $js = [	  
		//'js/snap.svg-min.js',
	  //  'js/jcanvas.min.js',
		
	   // 'js/raphael.min.js',
		//'js/rotodrag.js',
    'js/svgCanvas.js',
        'js/ArcText.js',
		'js/svgtext.js',
      //  'js/stampwidget.js'
    ];

    public $css = [
         // CDN lib
     //   '//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css',
	//	'//unicons.iconscout.com/release/v4.0.0/css/line.css',
      //  'css/rich-text-editor.css',
		//'css/demo.css',
		//'css/stampwidget.css',
		'css/styles.css'
    ];

    public $depends = [
        'yii\web\JqueryAsset',
		'yii\widgets\PjaxAsset',
      //  'yii\bootstrap\BootstrapPluginAsset',
        'app\admin\stampwidget\assets\AjaxFormAsset',
    ];

    public function init()
    {
        // Tell AssetBundle where the assets files are
        $this->sourcePath = __DIR__ . "/";
        parent::init();
    }
}
