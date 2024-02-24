<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "language".
 *
 * @property string $id
 * @property string $name
 * @property integer $enabled
 */
class Language extends ActiveRecord
{
    private static $_list;

    private static $_suffix_list;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'language';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name'], 'required'],
            [['enabled'], 'boolean'],
            [['id'], 'string', 'max' => 3],
            [['name'], 'string', 'max' => 31],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'enabled' => 'Enabled',
        ];
    }

    /**
     * @return array
     */
    public static function suffixList()
    {
        if (static::$_suffix_list) {
            return static::$_suffix_list;
        }

        $list = static::list();
        
        $_suffix_list[''] = $list[Yii::$app->language];
        
        unset($list[Yii::$app->language]);
        
        foreach ($list as $k => $v) {
            $_suffix_list['_' . $k] = $v;
        }
        
        return $_suffix_list;
    }

    /**
     * @return array
     */
    public static function list()
    {
        if (static::$_list) {
            return static::$_list;
        }

        return static::$_list = ArrayHelper::map(self::find()->asArray()->all(), 'id', 'name');
    }
}