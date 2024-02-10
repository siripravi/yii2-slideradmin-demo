<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "stamp_layer".
 *
 * @property int $id
 * @property int $stamp_id
 * @property int $layer_id
 *
 * @property Stamp $id0
 * @property Layer $layer
 */
class StampLayer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stamp_layer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['stamp_id', 'layer_id'], 'required'],
            [['stamp_id', 'layer_id'], 'integer'],
            [['layer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Layer::className(), 'targetAttribute' => ['layer_id' => 'id']],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => Stamp::className(), 'targetAttribute' => ['id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'stamp_id' => 'Stamp ID',
            'layer_id' => 'Layer ID',
        ];
    }

    /**
     * Gets query for [[Id0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(Stamp::className(), ['id' => 'id']);
    }

    /**
     * Gets query for [[Layer]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLayer()
    {
        return $this->hasOne(Layer::className(), ['id' => 'layer_id']);
    }
}
