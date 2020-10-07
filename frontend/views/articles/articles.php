<style>
    .main_articles {
        display: flex;
        flex-direction: column;
    }
    .pagination{
        text-align: center;
    }
</style>

<main class="main_articles">


    <?php

    foreach ($articles as $key => $article) :
    ?>
        <?= \common\widgets\ArticleShow::widget(['article' => $article])  ?>
    <?php
    endforeach;
    ?>
    <div class="pagination" >
        <?php
        echo \yii\widgets\LinkPager::widget([
            'pagination' => $pagination,
        ]);
        ?>
    </div>

    <main>