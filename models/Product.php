<?php

namespace app\models;

use app\behaviors\BaseProductBehaviar;
use app\behaviors\LanguageBehavior;
use omgdef\multilingual\MultilingualQuery;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property integer $model_id
 * @property integer $brand_id
 * @property string $slug
 * @property string $code
 * @property string $price
 * @property string $old_price
 * @property integer $available
 * @property integer $currency_id
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $position
 * @property integer $enabled
 *
 * @property Model $model
 * 
 * Language
 *
 * @property string $name
 * @property string $title
 * @property string $keywords
 * @property string $description
 * @property string $text
 */
class Product extends ActiveRecord
{
    //public $brand_id;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            LanguageBehavior::className(),
            TimestampBehavior::className(),
            BaseProductBehaviar::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['currency_id', 'slug', 'name', 'title', 'brand_id'], 'required'],
            [['model_id', 'available', 'currency_id', 'position', 'brand_id'], 'integer'],
            [['price', 'old_price'], 'number'],
            [['price', 'old_price'], 'default', 'value' => 0.0],
            [['slug', 'code', 'name', 'title', 'keywords'], 'string', 'max' => 255],
            [['slug', 'code', 'name', 'title', 'keywords', 'description', 'text'], 'trim'],
            [['model_id'], 'exist', 'skipOnError' => true, 'targetClass' => Model::className(), 'targetAttribute' => ['model_id' => 'id']],
            [['position'], 'default', 'value' => 0],
            [['enabled', 'currency_id', 'brand_id'], 'default', 'value' => 1],
            [['enabled'], 'boolean'],
            [['model_id'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'model_id' => 'Model',
            'brand_id' => 'Brand',
            'slug' => 'Slug',
            'code' => 'Code',
            'price' => 'Price',
            'old_price' => 'Old Price',
            'available' => 'Available',
            'currency_id' => 'Currency',
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
    public function getModel()
    {
        return $this->hasOne(Model::className(), ['id' => 'model_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModelLang()
    {
        return $this->hasOne(Model::className(), ['id' => 'model_id'])->viaTable('model_lang', ['model_id' => 'model_id']);
    }

    /**
     * @return ActiveQuery
     */
    public static function find()
    {
        return new MultilingualQuery(get_called_class());
    }
}
