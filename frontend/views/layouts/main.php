<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous"> 
    <link href="https://fonts.googleapis.com/css2?family=Asap:wght@400;500;700&family=Bree+Serif&display=swap" rel="stylesheet">
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <style>
        *{
            font-family: 'Asap', sans-serif;
        }
    </style>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">

<?= \common\widgets\MyWidget::widget(['isGuest' => (int)Yii::$app->user->isGuest])  ?>
<?= \common\widgets\searchBar::widget()  ?>
    <div class="container">
        <?= $content ?>
    </div>
</div>
<?= \common\widgets\Footer::widget()  ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
