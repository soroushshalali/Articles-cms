<?php
use frontend\widgets\ArticleWidget;
?>
<h1><?=   $user->username  ?></h1>
<h1><?=   $user->email  ?></h1>
<h2>My Articles:</h2>
<?= ArticleWidget::widget(['articles' => $articles]) ?>