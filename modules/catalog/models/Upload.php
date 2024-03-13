<?php

namespace app\modules\catalog\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\helpers\Url;
use app\models\User;
/**
 * This is the model class for table "upload".
 *
 * @property integer $id
 * @property integer $file_id
 * @property integer $user_id
 * @property string $dir
 * @property string $name
 * @property integer $tmp
 * @property integer $time
 *
 * @property File $file
 * @property User $user
 */
class Upload extends ActiveRecord
{
    const DIR_OTHER = 'other';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'upload';
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
            [['file_id', 'user_id', 'name'], 'required'],
            [['file_id', 'user_id'], 'integer'],
            [['tmp'], 'boolean'],
            [['dir', 'name'], 'string', 'max' => 255],
            ['dir', 'default', 'value' => self::DIR_OTHER],
            [['file_id'], 'exist', 'skipOnError' => true, 'targetClass' => File::className(), 'targetAttribute' => ['file_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }
    
    // TODO: перенести в Image модель
    /*public function getLink()
    {
        return Url::to(['image/small', 'dir' => $this->dir, 'name' => $this->name]);
    }*/

    /**
     * @return string
     */
    public function getLinkOl()
    {
        // TODO: getLink() пришлось вынести в отдельный класс backend\models
        return Yii::$app->urlManager->createUrl(['file/open', 'dir' => $this->dir, 'name' => $this->name]);
    }

    public function getLink()
    {
        return Yii::$app->urlManager->createAbsoluteUrl(['file/open', 'dir' => $this->dir, 'name' => $this->name]);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'file_id' => 'File ID',
            'user_id' => 'User ID',
            'tmp' => 'Temp',
            'dir' => 'Dir',
            'name' => 'Name',
            'time' => 'Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFile()
    {
        return $this->hasOne(File::className(), ['id' => 'file_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function afterDelete()
    {
        if (!self::find()->where(['file_id' => $this->file_id])->count()) {
            File::findOne($this->file_id)->delete();
        }

        parent::afterDelete();
    }
}
