<?php
// your_app/votewidget/VoteWidgetAsset.php

namespace app\stampwidget\assets;

use yii\web\AssetBundle;

class StampWidgetAsset extends AssetBundle
{
    public $js = [
	   // '//cdnjs.cloudflare.com/ajax/libs/d3/3.5.5/d3.min.js',
		//'//unpkg.com/mithril/mithril.js',
		'js/snap.svg-min.js',
	    'js/jcanvas.min.js',
		
	    'js/raphael.min.js',
		'js/rotodrag.js',
		//'js/main.js',
        'js/stampwidget.js'
    ];

    public $css = [
         // CDN lib
        '//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css',
		'//unicons.iconscout.com/release/v4.0.0/css/line.css',
      //  'css/rich-text-editor.css',
		//'css/demo.css',
		//'css/stampwidget.css',
		'css/styles.css'
    ];

    public $depends = [
        'yii\web\JqueryAsset',
		'yii\widgets\PjaxAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        'app\stampwidget\assets\AjaxFormAsset',
    ];

    public function init()
    {
        // Tell AssetBundle where the assets files are
        $this->sourcePath = __DIR__ . "/";
        parent::init();
    }
}
