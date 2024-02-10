<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "stamp".
 *
 * @property int $id
 * @property string $name
 * @property resource $imageData
 *
 * @property StampLayer $stampLayer
 */
class Stamp extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stamp';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'imageData'], 'required'],
            [['imageData'], 'string'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'imageData' => 'Image Data',
        ];
    }

    /**
     * Gets query for [[StampLayer]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStampLayer()
    {
        return $this->hasOne(StampLayer::className(), ['id' => 'id']);
    }
}
