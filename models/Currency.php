<?php

namespace app\models;

use app\behaviors\LanguageBehavior;
use omgdef\multilingual\MultilingualQuery;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "currency".
 *
 * @property integer $id
 * @property string $code
 * @property string $rate
 * @property integer $primary
 * @property integer $position
 * @property integer $enabled
 *
 * Language
 *
 * @property string $name
 * @property string $before_name
 * @property string $after_name
 */
class Currency extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'currency';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            LanguageBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'rate'], 'required'],
            [['rate'], 'number'],
            [['primary', 'position'], 'integer'],
            [['primary', 'position'], 'default', 'value' => 0],
            [['enabled'], 'boolean'],
            [['enabled'], 'default', 'value' => 1],
            [['code'], 'string', 'max' => 3],
            [['name'], 'string', 'max' => 255],
            [['before_name', 'after_name'], 'string', 'max' => 20],
            [['code'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'rate' => 'Rate',
            'primary' => 'Primary',
            'position' => 'Position',
            'enabled' => 'Enabled',
            'name' => 'Name',
            'before_name' => 'Before name',
            'after_name' => 'After name',
        ];
    }

    public function getSymbol()
    {
        return trim($this->before_name.$this->after_name);
    }

    /**
     * @return array
     */
    public static function list()
    {
        $list = static::find()->where(['enabled' => 1])->orderBy(['position' => SORT_ASC])->all();
        
        return ArrayHelper::map($list, 'id', 'symbol');
    }

    /**
     * @return ActiveQuery
     */
    public static function find()
    {
        return new MultilingualQuery(get_called_class());
    }
}
