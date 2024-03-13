<?php
namespace app\modules\catalog\behaviors;

use app\modules\catalog\models\Language;
use omgdef\multilingual\MultilingualBehavior;
use yii\helpers\ArrayHelper;

class LanguageBehavior extends MultilingualBehavior
{

    public $attributes;

    public $languages;

    public $langForeignKey;

    public $tableName;

    public $languageField = 'lang_id';

    public $requireTranslations = true;

    /**
     * @param \yii\db\ActiveRecord $owner
     * @throws \yii\base\InvalidConfigException
     */
    public function attach($owner)
    {
        $this->languages = Language::list();

        $ownerTableName = $owner->tableName();

        if (!$this->langForeignKey) {
            $this->langForeignKey = $ownerTableName . '_id';
        }

        if (!$this->tableName) {
            $this->tableName = $ownerTableName . '_lang';
        }

        if (!$this->attributes) {

            $rules = ArrayHelper::getColumn($owner->rules(), 0);
            
            $attributes = [];

            foreach ($rules as $rule) {
                if (is_array($rule)) {
                    foreach ($rule as $r) {
                        $attributes[$r] = $r;
                    }
                } else {
                    $attributes[$rule] = $rule;
                }

            }

            foreach ($owner->attributes as $k => $v) {
                if (isset($attributes[$k])) {
                    unset($attributes[$k]);
                }
            }

            $this->attributes = array_values($attributes);
        }

        parent::attach($owner);
    }
}