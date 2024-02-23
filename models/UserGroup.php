<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;


/**
 * This is the model class for table "user_group".
 *
 * @property integer $id
 *
 * @property User $user

 */
class UserGroup extends ActiveRecord
{

    const USER_GROUP_ALL_USERS = 1;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_group';
    }


    /**
     * @inheritdoc
     */
    public function behaviors()
    {
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('shop', 'ID'),
            'user_id' => Yii::t('shop', 'User ID'),
        ];
    }
}
