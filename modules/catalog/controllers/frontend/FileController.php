<?php

namespace app\modules\catalog\controllers\frontend;

use app\models\Upload;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class FileController extends Controller
{
    /**
     * @param $dir
     * @param $name
     * @return $this
     * @throws NotFoundHttpException
     */
    public function actionOpen($dir, $name)
    {
        $upload = $this->findUpload($dir, $name);

        Yii::$app->response->headers->set('Content-Type', $upload->file->mime);
        Yii::$app->response->format = Response::FORMAT_RAW;
        Yii::$app->response->data = file_get_contents($upload->file->filename);

        return Yii::$app->response;
    }

    /**
     * @param $dir
     * @param $name
     * @return $this
     * @throws NotFoundHttpException
     */
    public function actionDownload($dir, $name)
    {
        $upload = $this->findUpload($dir, $name);

        return Yii::$app->response->xSendFile($upload->file->filename, $upload->name);
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
