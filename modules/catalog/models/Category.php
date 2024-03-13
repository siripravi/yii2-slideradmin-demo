<?php

namespace app\modules\catalog\models;

use app\modules\catalog\behaviors\LanguageBehavior;
use omgdef\multilingual\MultilingualQuery;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property integer $parent_id
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
class Category extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
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
            [['parent_id', 'position'], 'integer'],
            [['enabled'], 'boolean'],
            [['enabled'], 'default', 'value' => 1],
            [['position'], 'default', 'value' => 0],
            [['parent_id'], 'default', 'value' => null],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
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
