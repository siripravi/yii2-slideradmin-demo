<?php

namespace app\modules\userauth\models;

use Yii;
use yii\db\ActiveRecord;
use luya\admin\ngrest\base\NgRestModel;

/**
 * This is the model class for table "user_address".
 * @author Albert Gainutdinov <xalbert.einsteinx@gmail.com>
 *
 * @property integer $id
 * @property integer $user_profile_id
 * @property string $country
 * @property string $region
 * @property string $city
 * @property string $house
 * @property string $apartment
 * @property integer $zipcode
 * @property integer $postoffice
 * @property integer $contact_person
 * @property integer $contact_mobile1
 * @property integer $contact_mobile2
 * @property Profile $userProfile
 */
class UserAddress extends NgRestModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_address';
    }

    public static function ngRestApiEndpoint()
    {
        return 'api-userauth-user-address';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_profile_id', 'zipcode'], 'integer'],
            [['country', 'region', 'city', 'street', 'house', 'contact_person'], 'string', 'max' => 255],
            [['contact_mobile1', 'contact_mobile2'], 'string', 'max' => 16],
            [['user_profile_id'], 'exist', 'skipOnError' => true, 'targetClass' => Profile::class, 'targetAttribute' => ['user_profile_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'country' => Yii::t('app', 'Country'),
            'region' => Yii::t('app', 'Region'),
            'city' => Yii::t('app', 'City'),
            'house' => Yii::t('app', 'House'),
            'apartment' => Yii::t('app', 'Apartment'),
            'zipcode' => Yii::t('app', 'Zip-Code'),
            'post-office' => Yii::t('app', 'Post office')
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserProfile()
    {
        return $this->hasOne(Profile::class, ['id' => 'user_profile_id']);
    }
}
