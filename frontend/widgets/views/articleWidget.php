<div class="slide <?= ($counterr==1) ? 'active' : 'after'  ?>">
    <article>
        <h2><?php echo $article->title ?></h2>
        <p><?php echo $article->short_text ?></p>
    </article>
    <a class="show_article" href="http://localhost/articles/article/<?php echo $article->id ?>">More . . .</a>

</div>