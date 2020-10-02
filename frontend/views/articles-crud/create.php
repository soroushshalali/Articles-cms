<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\ArticlesCrud */

$this->title = 'Create Articles Crud';
$this->params['breadcrumbs'][] = ['label' => 'Articles Cruds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="articles-crud-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
