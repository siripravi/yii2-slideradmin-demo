<?php

namespace app\admin\components;

/**
 * Bootstrap 4 Active Field.
 *
 * @author Basil Suter <basil@nadar.io>
 */
class ActiveField extends \yii\widgets\ActiveField
{
    /**
     * @inheritdoc
     */
    public $hintOptions = ['class' => 'form-text text-muted'];

    /**
     * @inheritdoc
     */
    public $errorOptions = ['class' => 'invalid-feedback'];
}