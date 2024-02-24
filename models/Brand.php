<?php

namespace app\models;

use app\behaviors\LanguageBehavior;
use omgdef\multilingual\MultilingualQuery;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "brand".
 *
 * @property integer $id
 * @property string $slug
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $position
 * @property integer $enabled
 * 
 * Language
 * 
 * @property string $name
 * @property string $title
 * @property string $keywords
 * @property string $description
 * @property string $text
 */
class Brand extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'brand';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            LanguageBehavior::className(),
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['slug', 'name', 'title'], 'required'],
            [['slug', 'name', 'title', 'keywords'], 'string', 'max' => 255],
            [['description', 'text'], 'string'],
            [['slug', 'name', 'title', 'keywords', 'description', 'text'], 'trim'],
            [['position'], 'integer'],
            [['enabled'], 'boolean'],
            [['position'], 'default', 'value' => 0],
            [['enabled'], 'default', 'value' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'slug' => 'Slug',
            'position' => 'Position',
            'enabled' => 'Enabled',
            'name' => 'Name',
            'title' => 'Title',
            'keywords' => 'Keywords',
            'description' => 'Description',
            'text' => 'Text'
        ];
    }
    
    public static function list()
    {
        $list = static::find()->orderBy(['position' => SORT_ASC])->all();

        return ArrayHelper::map($list, 'id', 'name');
    }

    /**
     * @return ActiveQuery
     */
    public static function find()
    {
        return new MultilingualQuery(get_called_class());
    }

    /**
     * @inheritdoc
     */
    public function beforeDelete()
    {
        if (parent::beforeDelete()) {
            if ($this->id == 1) {
                return false;
            }
            return true;
        } else {
            return false;
        }
    }
}
