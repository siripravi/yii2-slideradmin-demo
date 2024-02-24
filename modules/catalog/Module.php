<?php

namespace app\modules\userauth;

/**
 * image module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\userauth\controllers\backend';
    protected $_isBackend;
    
    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        $this->registerTranslations();
		        
		$this->setComponents([
            
			
			]);
		if ($this->getIsBackend() === true) { 
          $this->controllerNamespace = 'app\modules\userauth\controllers\backend';
		  $this->viewPath = '@app/modules/userauth/views/backend';
		
        } else {
            $this->controllerNamespace = 'app\modules\userauth\controllers\frontend';
            $this->setViewPath('@app/modules/userauth/views/frontend');			
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
        return Yii::t('@siripravi/userauth/' . $category, $message, $params, $language);
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
