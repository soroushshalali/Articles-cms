
<style>
    .main_articles{
        display: flex;
        flex-direction: column;

    }
</style>

<main class="main_articles" >
<?php
    foreach ($articles as $key => $article):
?>
<?= \common\widgets\ArticleShow::widget(['article' => $article ])  ?>
<?php
endforeach;
?>
</main>



