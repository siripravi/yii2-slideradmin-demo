<?php

namespace app\admin\components;

use Yii;
use yii\web\UrlManager;

class SiteUrlManager extends UrlManager
{
    public function parseRequest($request)
    {
        if (strpos($request->url, 'index.php') || strpos($request->url, 'index.html')) {
            Yii::$app->response->redirect('/', 301);
        }

        return parent::parseRequest($request);
    }

    public function createUrl($params)
    {
        $url = parent::createUrl($params);

        $lang = null;

        if (isset($params['lang'])) {
            $lang = $params['lang'] === 'en' ? '/en' : '';
            unset($params['lang']);
            $url = $lang . str_replace('/en/', '/', parent::createUrl($params));
        }

        if ($lang === null &&
            empty($params['lang']) &&
            Yii::$app->language === 'en' &&
            strpos($params[0], 'image/') !== 0 &&
            strpos($url, '/en/') !== 0) {
            $url = '/en' . $url;
        }

        return $url;
    }
}