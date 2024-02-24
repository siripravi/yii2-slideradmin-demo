<?php

namespace app\modules\catalog\models\backend;

use Yii;

// TODO: getLink() пришлось вынести в отдельный класс backend\models

class Upload extends \app\models\Upload
{
    /**
     * @return string
     */
    public function getLink()
    {
        return Yii::$app->urlManager->createAbsoluteUrl(['file/open', 'dir' => $this->dir, 'name' => $this->name]);
    }
}