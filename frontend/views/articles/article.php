
<style>
    .main_article{
    height: 650px;
    }
    .main_article > article{
        display: flex;
        flex-direction: column;
    }
   .main_article > article > p{
        height:500px ;

    }
    .main_article > article > div{
         display: flex;
        justify-content: space-between;
    }
</style>

<main class="main_article" >
    <article>
        <h1><?= $model->title ?></h1>
        <p><?= $model->text ?></p>
       <div>
           <h4><?= $model->author ?></h4>
           <h4><?= date('y,m,d' , $model->created_at) ?></h4>
       </div>
    </article>
    <a href="http://localhost/articles/delete/<?= $model->id ?>" >Delete</a>
    <a href="http://localhost/articles/update/<?= $model->id ?>" >update</a>

</main>




