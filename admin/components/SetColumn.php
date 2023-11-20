<?php
/**
 * Created by PhpStorm.
 * User: dench
 * Date: 10.10.16
 * Time: 12:21
 */

namespace app\admin\components;

use yii\grid\DataColumn;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class SetColumn extends DataColumn
{
    /**
     * @var callable
     */
    public $name;
    /**
     *
     * @var array
     */
    public $cssClasses = [];

    protected function renderDataCellContent($model, $key, $index)
    {
        $value = $this->getDataCellValue($model, $key, $index);
        $name = $this->getStatusName($model, $key, $index, $value);
        if ($this->cssClasses) {
            $class = ArrayHelper::getValue($this->cssClasses, $value, 'default');
            $html = Html::tag('span', Html::encode($name), ['class' => 'label label-' . $class]);
        } else {
            $html = Html::encode($name);
        }
        return $value === null ? $this->grid->emptyCell : $html;
    }

    /**
     * @param mixed $model
     * @param mixed $key
     * @param integer $index
     * @param mixed $value
     * @return string
     */
    private function getStatusName($model, $key, $index, $value)
    {
        if ($this->name !== null) {
            if (is_string($this->name)) {
                $name = ArrayHelper::getValue($model, $this->name);
            } else {
                $name = call_user_func($this->name, $model, $key, $index, $this);
            }
        } else {
            $name = null;
        }
        return $name === null ? $value : $name;
    }
}