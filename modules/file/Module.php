<?php

namespace app\modules\file;

/**
 * file module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\file\controllers';
    protected $_isBackend;
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->registerTranslations();
		        
		$this->setComponents([
            
			
			]);
		if ($this->getIsBackend() === true) { 
          $this->controllerNamespace = 'app\modules\file\controllers\backend';
		  $this->viewPath = '@app/modules/file/views/backend';
		
        } else {
            $this->controllerNamespace = 'app\modules\file\controllers\frontend';
            $this->setViewPath('@app/modules/file/views/frontend');			
        }	
    }
    public function registerTranslations()
    {
      /*  \Yii::$app->i18n->translations['@siripravi/slideradmin/*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en',
            'basePath' => '@siripravi/slideradmin/messages',
           
            'fileMap' => [
                'modules/slider/app' => 'app.php',
                'modules/slider/error' => 'error.php',
            ],
            
        ];*/
    }

    public static function t($category, $message, $params = [], $language = null)
    {
        return Yii::t('@siripravi/file/' . $category, $message, $params, $language);
    }
	
	/**
     * Check if module is used for backend application.
     *
     * @return boolean true if it's used for backend application
     */
    public function getIsBackend()
    {
        if ($this->_isBackend === null) {
            $this->_isBackend = strpos($this->controllerNamespace, 'app') === false ? false : true;
        }

        return $this->_isBackend;
    }
}
