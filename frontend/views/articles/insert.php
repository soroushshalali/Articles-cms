<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>

<?php $insertForm = ActiveForm::begin(['id' => 'form-insert']); ?>

<?= $insertForm->field($model, 'title')->textInput(['autofocus' => true]) ?>

<?= $insertForm->field($model, 'text')->textarea(['rows' => '6']) ?>

<?= $insertForm->field($model, 'short_text') ?>


<div class="form-group">
    <?= Html::submitButton('Insert', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
</div>

<?php ActiveForm::end(); ?>


