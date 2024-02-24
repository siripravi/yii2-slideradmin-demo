<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

/**
 * This is the model class for table "file".
 *
 * @property integer $id
 * @property string $dir
 * @property string $hash
 * @property string $extension
 * @property string $mime
 * @property integer $size
 * @property integer $time
 *
 * @property string $filename
 * @property Upload[] $uploads
 */
class File extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'file';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dir', 'hash', 'extension', 'mime', 'size'], 'required'],
            [['size'], 'integer'],
            [['dir'], 'string', 'max' => 255],
            [['hash', 'mime'], 'string', 'max' => 32],
            [['extension'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dir' => 'Dir',
            'hash' => 'Hash',
            'extension' => 'Extension',
            'mime' => 'Mime',
            'size' => 'Size',
            'time' => 'Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUploads()
    {
        return $this->hasMany(Upload::className(), ['file_id' => 'id']);
    }

    public function getFilename()
    {
        return Yii::$app->params['uploads_path'] . '/' . $this->dir . '/' . $this->hash . '.' . $this->extension;
    }

    /**
     * @param $file UploadedFile
     * @throws \yii\base\Exception
     * @return integer
     */
    public static function upload($file)
    {
        $hash = md5_file($file->tempName);

        $model = self::findOne(['hash' => $hash, 'size' => $file->size]);
        if (empty($model)) {
            $model = new File();
            $model->dir = date('mY');
            $model->hash = $hash;
            $model->extension = $file->extension;
            $model->mime = $file->type;
            $model->size = $file->size;
            if ($model->validate()) {
                $path = Yii::$app->params['uploads_path'] . '/' . $model->dir . '/';
                FileHelper::createDirectory($path);
                $filename = $path . $hash . '.' . $model->extension;
                if ($file->saveAs($filename)) {
                    $model->save(false);
                }
            }
        }
        return $model->id;
    }

    /**
     * @inheritdoc
     */
    public function afterDelete()
    {
        $path = Yii::$app->params['uploads_path'] . '/' . $this->dir . '/';

        $filename = $path . $this->hash . '.' . $this->extension;

        if (file_exists($filename)) {
            unlink($filename);
        }

        parent::afterDelete();
    }
}
