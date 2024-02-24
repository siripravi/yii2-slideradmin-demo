<?php
/**
 * Created by PhpStorm.
 * User: dench
 * Date: 18.06.16
 * Time: 14:34
 */

/** @var \app\modules\catalog\models\backend\UploadForm $model */

use yii\bootstrap5\ActiveForm;

?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

<?= $form->field($model, 'upload[]')->fileInput(['multiple' => true]) ?>

    <button>Submit</button>

<?php ActiveForm::end() ?>