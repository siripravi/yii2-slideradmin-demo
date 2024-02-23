<?php

namespace siripravi\slideradmin;

/**
 * image module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'siripravi\slideradmin\controllers\backend';
    protected $_isBackend;
    
    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        $this->registerTranslations();
		        
		$this->setComponents([
            
			'slider' => [
				'class' => 'siripravi\slideradmin\components\ImgManager',
				//'imagePath' => '@webroot/files/images/',
				'versions' => [
					//'small'=>array('width'=>120,'height'=>120),
					'small' => ['width' => 72, 'height' => 72],
					'medium' => ['width' => 200, 'height' => 150],
					'large' => ['width' => 1920, 'height' => 566],
				],
				
			   ]
			]);
		if ($this->getIsBackend() === true) { 
		  $this->viewPath = '@siripravi/slideradmin/views/backend';
		
        } else {
			
            $this->setViewPath('@siripravi/slideradmin/views/frontend');			
        }	
    }
      public function registerTranslations()
    {
        \Yii::$app->i18n->translations['@siripravi/slideradmin/*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en',
            'basePath' => '@siripravi/slideradmin/messages',
           
            'fileMap' => [
                'modules/slider/app' => 'app.php',
                'modules/slider/error' => 'error.php',
            ],
            
        ];
    }

    public static function t($category, $message, $params = [], $language = null)
    {
        return Yii::t('@siripravi/slideradmin/' . $category, $message, $params, $language);
    }
	
	/**
     * Check if module is used for backend application.
     *
     * @return boolean true if it's used for backend application
     */
    public function getIsBackend()
    {
        if ($this->_isBackend === null) {
            $this->_isBackend = strpos($this->controllerNamespace, 'backend') === false ? false : true;
        }

        return $this->_isBackend;
    }
}
