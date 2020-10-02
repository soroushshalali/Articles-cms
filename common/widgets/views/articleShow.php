<style>

    .slide {
        display: flex;
        flex-direction: column;
        background-color: #e7e7fc;
        box-shadow: 0 0 4px #cdcdcd;
        height: 350px;
        padding: 10px 20px;
        margin-bottom: 10px;
    }

    .slide > article{
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .slide > article > h2{
        font-size: 40px;
        color: #3b3b3b;
        font-weight: 600;
    }

    .slide > article  p{
        font-size: 20px;
    }

    .slide> a {
        width: 100px;
        padding: 10px 0;
        border-radius: 4px;
        background-color: #6c6c9f;
        box-shadow: #cdcdcd;
        color: white;
        transition: 0.4s;
        float: right;
        text-align: center;
        font-weight: 600;
        align-self: end;
        justify-self: end;
        text-decoration: none;
    }

    .slide> a:hover{
        background-color: #4444ba;
        transition: 0.4s;
    }

    .slide>button {
        width: 100px;
        align-self: flex-end;
    }

</style>

            <div class="slide" data-flag="start">
                <article>
                    <h2><?= $article->title  ?></h2>
                    <p><?= $article->short_text  ?></p>
                </article>
                <a class="show_article" href="http://localhost/articles/article/<?= $article->id  ?>">More . . .</a>
            </div>

