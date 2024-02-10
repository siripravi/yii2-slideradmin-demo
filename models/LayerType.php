<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "layer_type".
 *
 * @property int $id
 * @property string $name
 *
 * @property Layer[] $layers
 */
class LayerType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'layer_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 225],
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
        ];
    }

    /**
     * Gets query for [[Layers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLayers()
    {
        return $this->hasMany(Layer::className(), ['type_id' => 'id']);
    }
}
