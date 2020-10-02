<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>

<?php $updateForm = ActiveForm::begin(['id' => 'form-insert']); ?>

<?= $updateForm->field($model, 'title')->textInput(['autofocus' => true]) ?>

<?= $updateForm->field($model, 'text')->textarea(['rows' => '6']) ?>

<?= $updateForm->field($model, 'short_text') ?>


<div class="form-group">
    <?= Html::submitButton('Update', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
</div>

<?php ActiveForm::end(); ?>


