<?php

namespace app\models;
use yii\base\Security;
use ParagonIE\ConstantTime\Base32;
use Yii;

/**
 * This is the model class for table "layer".
 *
 * @property int $id
 * @property int $stamp_id
 * @property string $text
 * @property int $type_id
 * @property string $font
 * @property int $fontSize
 * @property float $spacing
 * @property int $centerX
 * @property int $centerY
 * @property int $radiusX
 * @property int $radiusY
 * @property string $angleStart
 * @property string $angleEnd
 * @property string $rotate
 * @property string $hash
 * @property string $pathText
 *
 * @property Stamp $stamp
 * @property StampLayer[] $stampLayers
 * @property LayerType $type
 */
class Layer extends \yii\db\ActiveRecord
{
	
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'layer';
    }

    public function init(){
     parent::init();
	 $length = strlen($this->text);
   //  $this->spacing = 8 * $length;
	// $this->centerX = 125;
	if($this->type == 1)  
                $this->angleStart = ($this->spacing <= 180 ) ? 180 + (180 - $this->spacing ) / 2 : 180 - ($this->spacing - 180) / 2;
		    if($this->type  == 3)
			  	$this->angleStart = ($this->spacing < 180 ) ? 180 - (180 - $this->spacing ) / 2 : 180 - ($this->spacing - 180) / 2;
 }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['stamp_id', 'text', 'type_id', 'fontSize','hash'], 'required'],
            [['stamp_id', 'type_id', 'fontSize', 'centerX','centerY','radiusX','radiusY'], 'integer'],
            [['spacing','angleStart','angleEnd','centerX','centerY','radiusX','radiusY','rotate'], 'number'],
            [['text', 'hash'], 'string', 'max' => 100],
			//[['pathText'],'string','max' => 225],
            [['font'], 'string', 'max' => 200],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => LayerType::className(), 'targetAttribute' => ['type_id' => 'id']],
           // [['stamp_id'], 'exist', 'skipOnError' => true, 'targetClass' => Stamp::className(), 'targetAttribute' => ['stamp_id' => 'id']],
			['stamp_id', 'default', 'value' => 0],
			['type_id', 'default', 'value' => 1],
			['font', 'default', 'value' => 'Arial'],
			['fontSize', 'default', 'value' => 10],
			['radiusX', 'default', 'value' => 50],
			['radiusY', 'default', 'value' => 144],
			['centerX', 'default', 'value' => 125],
			['centerY', 'default', 'value' => 125],
			['rotate', 'default', 'value' => 0],
			['spacing', 'default', 'value' => 180],
			//['angleStart', 'default', 'value' => 0],
			['hash', 'default', 'value' => (isset($_SESSION['wgt_key']))? $_SESSION['wgt_key']:null],
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
            'text' => 'Text',
            'type_id' => 'Type ID',
            'font' => 'Font',
            'fontSize' => 'Font Size',           
			'centerX'  => 'center-X',
			'centerY' =>  'center-Y',
            'radiusX' => 'Radius-X',
			'radiusY' => 'Radius-Y',
			'angleStart' => 'Strt Angle',
			'angleEnd' => 'End angle',
			'spacing'  => 'sweep Angle',
            'hash' => 'Hash',
			'pathText' => 'SVG Path'
        ];
    }

    /**
     * Gets query for [[Stamp]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStamp()
    {
        return $this->hasOne(Stamp::className(), ['id' => 'stamp_id']);
    }

    /**
     * Gets query for [[StampLayers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStampLayers()
    {
        return $this->hasMany(StampLayer::className(), ['layer_id' => 'id']);
    }

    /**
     * Gets query for [[Type]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(LayerType::className(), ['id' => 'type_id']);
    }
	
	/*public function beforeSave($insert)
    {
        if ($this->isNewRecord) {

            $this->created_datetime = date('Y-m-d H:i:s');
        }

        $this->updated_datetime = date('Y-m-d H:i:s');

        return parent::beforeSave($insert);
    }*/
	public static function generateSecret($length = 20)
 {
     $security = new Security();
     $full = Base32::encode($security->generateRandomString($length));
     return substr($full, 0, $length);
 }
}
