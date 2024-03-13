<?php
/**
 * Created by PhpStorm.
 * User: dench
 * Date: 18.06.16
 * Time: 14:30
 */

namespace app\modules\catalog\models;

use app\modules\catalog\models\File;
use app\modules\catalog\models\Upload;
use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

/**
 * @property $name string
 */

class UploadForm extends Model
{
    /**
     * @var UploadedFile[]
     */
    public $upload;

    public $name;

    public function rules()
    {
        return [
            [['upload'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, gif, bmp, zip', 'maxFiles' => 10], // php.ini max_file_uploads
            [['name'], 'string', 'max' => 100],
            [['name'],  'match', 'pattern' => '/^[a-z]*$/i']
        ];
    }

    /**
     * @return bool
     */
    public function upload()
    {
        if ($this->validate()) {
            foreach ($this->upload as $item) {
                $upload = new Upload();
                $upload->user_id = Yii::$app->user->identity->getId();
                $upload->file_id = File::upload($item);
                $upload->name = ($this->name ? $this->name : md5(rand(1,99999))) . '.' . $item->extension;
                $upload->save();
            }
            return true;
        } else {
            return false;
        }
    }
}