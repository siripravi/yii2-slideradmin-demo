<?php

namespace app\behaviors;

use app\models\Language;
use app\models\Model;
use app\models\Product;
use yii\base\Behavior;
use yii\db\ActiveRecord;

class BaseProductBehaviar extends Behavior
{
    public $attributes = ['brand_id', 'slug'];

    public $attributes_lang = ['name', 'title', 'keywords', 'description', 'text'];

    public $nullAttributes = [];

    private $model;

    /**
     * @inheritdoc
     */
    public function events()
    {
        return [
            ActiveRecord::EVENT_AFTER_FIND => 'afterFind',
            ActiveRecord::EVENT_BEFORE_UPDATE => 'beforeUpdate',
            ActiveRecord::EVENT_BEFORE_INSERT => 'beforeInsert',
            ActiveRecord::EVENT_AFTER_DELETE => 'afterDelete',
        ];
    }

    /**
     * Event ActiveRecord::EVENT_AFTER_FIND
     */
    public function afterFind()
    {
        /** @var \common\models\Product $owner */
        $owner = $this->owner;

        if ($owner->isRelationPopulated('translations')) {
            $model = $this->findModelMulti($owner->model_id);
            foreach (Language::suffixList() as $suffix => $name) {
                foreach ($this->attributes_lang as $v) {
                    if (empty($owner->{$v . $suffix})) {
                        $owner->{$v . $suffix} = $model->{$v . $suffix};
                        $this->nullAttributes[$v . $suffix] = true;
                    }
                }
            }
        } else {
            $model = $this->findModel($owner->model_id);
            foreach ($this->attributes_lang as $v) {
                if (empty($owner->{$v})) {
                    $owner->{$v} = $model->{$v};
                    $this->nullAttributes[$v] = true;
                }
            }
        }

        foreach ($this->attributes as $v) {
            if (empty($owner->{$v})) {
                $owner->{$v} = $model->{$v};
                $this->nullAttributes[$v] = true;
            }
        }
    }

    /**
     * Event ActiveRecord::EVENT_BEFORE_UPDATE
     */
    public function beforeUpdate()
    {
        /** @var \common\models\Product $owner */
        $owner = $this->owner;

        if ($owner->isRelationPopulated('translations')) {
            $model = $this->findModelMulti($owner->model_id);
            foreach (Language::suffixList() as $suffix => $name) {
                foreach ($this->attributes_lang as $v) {
                    if ($owner->{$v . $suffix} == $model->{$v . $suffix}) {
                        $owner->{$v . $suffix} = '';
                    }
                }
            }
        } else {
            $model = $this->findModel($owner->model_id);
            foreach ($this->attributes_lang as $v) {
                if ($owner->{$v} == $model->{$v}) {
                    $owner->{$v} = '';
                }
            }
        }

        foreach ($this->attributes as $v) {
            if ($owner->{$v} == $model->{$v}) {
                $owner->{$v} = '';
            }
        }

        $model->save();
    }

    /**
     * Event ActiveRecord::EVENT_BEFORE_INSERT
     */
    public function beforeInsert()
    {
        /** @var \common\models\Product $owner */
        $owner = $this->owner;

        $model = new Model();

        foreach ($this->attributes as $v) {
            $model->{$v} = $owner->{$v};
            unset($owner->{$v});
        }

        foreach (Language::suffixList() as $suffix => $name) {
            foreach ($this->attributes_lang as $v) {
                $model->{$v . $suffix} = $owner->{$v . $suffix};
                $owner->{$v . $suffix} = '';
            }
        }

        $model->save();

        $owner->model_id = $model->id;
    }

    /**
     * Event ActiveRecord::EVENT_AFTER_DELETE
     */
    public function afterDelete()
    {
        /** @var \common\models\Product $owner */
        $owner = $this->owner;

        $count = Product::find()->where(['model_id' => $owner->model_id])->count();

        if (!$count) {
            Model::deleteAll(['id' => $owner->model_id]);
        }
    }

    /**
     * @param integer $id
     * @return \common\models\Model
     */
    public function findModel($id)
    {
        if ($this->model) {
            return $this->model;
        } else {
            return $this->model = Model::find()->where(['id' => $id])->one();
        }
    }

    /**
     * @param integer $id
     * @return \common\models\Model
     */
    public function findModelMulti($id)
    {
        if ($this->model) {
            return $this->model;
        } else {
            return $this->model = Model::find()->multilingual()->where(['id' => $id])->one();
        }
    }
}