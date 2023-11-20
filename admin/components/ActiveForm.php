<?php

namespace app\admin\components;

use yii\helpers\Html;

/**
 * Bootstrap 4 Active Form.
 *
 * There are two types of layouts:
 *
 * + default: Default layout with labels at the top of the fields.
 * + horizontal: Horizontal layout set the labels left to the fields.
 *
 * @author Basil Suter <basil@nadar.io>
 */
class ActiveForm extends \yii\widgets\ActiveForm
{
    /**
     * @var string Using different style themes:
     *
     * + default: Default layout with labels at the top of the fields.
     * + horizontal: Horizontal layout set the labels left to the fields.
     */
    public $layout = 'default';

    /**
     * @var string The error Summary alert class
     */
    public $errorSummaryCssClass = 'error-summary alert alert-danger';

    /**
     * @inheritdoc
     */
    public $fieldClass = 'app\admin\components\ActiveField';

    /**
     * @inheritdoc
     */
    public $errorCssClass = 'has-danger';

    /**
     * @inheritdoc
     */
    public $successCssClass = 'has-success';

    public $horizontalLabelClass = 'col-sm-5';

    public $horizontalInputClass = 'col-sm-7';

    public $horizontalTemplate = "{label}\n<div class=\"{horizontalInputClass}\">{input}\n{hint}\n{error}</div>";

    /**
     * @inheritdoc
     */
    public function init()
    {
        if ($this->layout == 'horizontal') {
            $this->provideHorizontalLayout();
        }

        parent::init();
    }

    /**
     * Change the configuration of the active field and form based on the horizontal inputs.
     *
     * Bootstrap 4 Example Output:
     *
     * ```php
     * <div class="form-group row">
     *     <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
     *     <div class="col-sm-10">
     *         <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
     *     </div>
     * </div>
     * ```
     */
    protected function provideHorizontalLayout()
    {
        Html::addCssClass($this->options, ['class' => 'form-group']);
        $this->fieldConfig = [
            'options' => [
                'class' => 'form-group row',
            ],
            'labelOptions' => [
                'class' => $this->horizontalLabelClass . ' col-form-label',
            ],
            'template' => str_replace('{horizontalInputClass}', $this->horizontalInputClass, $this->horizontalTemplate),
        ];
    }
}