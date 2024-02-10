<?php
/**
 * @link https://github.com/LAV45/yii2-ajax-create
 * @copyright Copyright (c) 2015 LAV45!
 * @license http://opensource.org/licenses/BSD-3-Clause
 */

namespace app\admin\stampwidget\assets;

use yii\web\AssetBundle;

/**
 * Class AjaxCreateAsset
 * @package lav45\widget
 */
 
class AjaxCreateAsset extends AssetBundle
{
   public $sourcePath = '@app/admin/stampwidget/assets/';

    public $js = [
        'js/main.js'
    ];

    public $depends = [
        'yii\widgets\PjaxAsset',
       // 'yii\bootstrap\BootstrapPluginAsset',
        'app\admin\stampwidget\assets\AjaxFormAsset',
    ];
}