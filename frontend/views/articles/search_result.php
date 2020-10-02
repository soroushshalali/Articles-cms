<?php

foreach ($result as $key => $article) :
?>
<?= \common\widgets\ArticleShow::widget(['article' => $article ])  ?>
<hr>
<?php   endforeach;   ?>
