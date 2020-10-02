<div class="slide <?= ($counterr==1) ? 'active' : 'after'  ?>">
    <article>
        <h2><?php echo $article->title ?></h2>
        <p><?php echo $article->short_text ?></p>
    </article>
    <a class="show_article" href="index.php?r=cms%2Farticle&id=<?php echo $article->id ?>">More . . .</a>
</div>