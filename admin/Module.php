<?php

namespace app\admin;

use Yii;

/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\admin\controllers';

    public $layout = 'main';

    /**
     * @inheritdoc
     */
    public function init()
    {
        // parent::init();

        /* Yii::$app->assetManager->bundles['yii\bootstrap5\BootstrapAsset'] = [
                'basePath'   => '@web',
               // 'sourcePath' => [],
               // 'css'        => ['css/styles.css'],
                'js'  => []
            ];

            Yii::$app->assetManager->bundles[]= [ 
              // 'deyraka\materialdashboard\web\MaterialDashboardAsset',
        
          ];*/
     /*   \Yii::$app->assetManager->bundles['yii\bootstrap5\BootstrapPluginAsset'] = [
            'js' => [],
        ];*/
        \Yii::$app->assetManager->bundles['yii\bootstrap5\BootstrapAsset'] = [
            'css' => [],
        ];
        \Yii::$app->assetManager->bundles['yii\web\JqueryAsset'] = [
            'sourcePath' => null,
            'js' => [
                'https://code.jquery.com/jquery-3.2.1.min.js',
            ],
        ]; 

        parent::init();
    }

}
