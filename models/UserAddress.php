<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

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
class UserAddress extends ActiveRecord
{
    public $selectPreset;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_address';
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
            [['province_id', 'city_id', 'district_id', 'is_default', 'user_id'], 'integer'],
            [['selectPreset'], 'safe']
        ];
    }

    public function scenarios()
    {
        $parent = parent::scenarios();

        $parent['useAddressInChoseCheckout'] = [
            'selectPreset'
        ];

        return $parent;
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
            'post-office' => Yii::t('app', 'Post office'),
            'province_id' => Yii::t('app', 'Province'),
            'city_id' => Yii::t('app', 'City'),
            'contact_mobile1' => Yii::t('app', 'Primary Mobile'),
            'contact_mobile2' => Yii::t('app', 'Alternate Mobile'),
            'is_default' => Yii::t('app', 'Save as fixed address'),
            'district_id' => Yii::t('app', 'Districts'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserProfile()
    {
        return $this->hasOne(Profile::class, ['id' => 'user_profile_id']);
    }


    public function ambilProvice()
    {
        $modelForm = new FormOrder();

        return $modelForm->ambilProvice();
    }

    public function ambilCity($province_id)
    {
        $modelForm = new FormOrder();
        return $modelForm->ambilCity($province_id);
    }

    /*mengambil data city di rajaongkir.com*/
    public function ambilProviceAndCityByOne()
    {

        $cacing = Yii::$app->cache; //add library cache

        $presetDefault = $cacing->get('defaultPresetLoc_' . $this->city_id . '_' . $this->province_id); // buat mbedain aja


        if ($presetDefault === false) {
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.rajaongkir.com/starter/city?id=" . $this->city_id . "&province=" . $this->province_id,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                    "key: 2e1133159f82d8cde07efe55272489ad"
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
                echo "cURL Error #:" . $err;
            } else {
                $result = json_decode($response, true);
                $result = $result['rajaongkir']['results'];


                $cacing->set('defaultPresetLoc_' . $this->city_id . '_' . $this->province_id, $result, 3600); // di cache 300 detik
                $presetDefault = $cacing->get('defaultPresetLoc_' . $this->city_id . '_' . $this->province_id);
            }
        }

        return $presetDefault;
    }
}
