<?php

namespace app\modules\catalog\controllers\frontend;

use app\models\Upload;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use Intervention\Image\ImageManagerStatic as Image;

class ImageController extends Controller
{
    public function actionSmall($dir, $name)
    {
        $model = $this->findUpload($dir, $name);

        /*Image::make($model->file->filename)
            ->fit(300, 100)
            ->save(Yii::getAlias('@frontend/web/thumb-test-image.jpg'), 80);*/

        print_r($model->link);
    }

    public function actionMedium($dir, $name)
    {
        echo 'medium';
    }

    public function actionLarge($dir, $name)
    {
        echo 'large';
    }

    /**
     * @param $dir
     * @param $name
     * @return Upload
     * @throws NotFoundHttpException
     */
    protected function findUpload($dir, $name)
    {
        if (($model = Upload::findOne(['dir' => $dir, 'name' => $name])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
