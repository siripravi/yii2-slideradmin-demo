<?php

namespace app\modules\catalog\models;

use app\modules\catalog\behaviors\LanguageBehavior;
use omgdef\multilingual\MultilingualQuery;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "model".
 *
 * @property integer $id
 * @property integer $brand_id
 * @property string $slug
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $position
 * @property integer $enabled
 *
 * @property Product[] $products
 * 
 * Language
 *
 * @property string $name
 * @property string $title
 * @property string $keywords
 * @property string $description
 * @property string $text
 */
class Model extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'model';
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
            [['brand_id', 'slug', 'name', 'title'], 'required'],
            [['slug', 'name', 'title', 'keywords'], 'string', 'max' => 255],
            [['description', 'text'], 'string'],
            [['slug', 'name', 'title', 'keywords', 'description', 'text'], 'trim'],
            [['brand_id', 'position'], 'integer'],
            [['position'], 'default', 'value' => 0],
            [['enabled', 'brand_id'], 'default', 'value' => 1],
            [['enabled'], 'boolean'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'brand_id' => 'Brand ID',
            'slug' => 'Slug',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
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
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['model_id' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public static function find()
    {
        return new MultilingualQuery(get_called_class());
    }
}
