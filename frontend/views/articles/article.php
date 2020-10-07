<style>
    .main_article > article{
        display: flex;
        flex-direction: column;
    }
   .main_article > article > h1{
    font-family: 'Bree Serif', serif;
    font-size: 50px;
    color: #4e4e4e;
    text-shadow: 0 0 1px #4e4e4e;
    }
    .main_article > article > p{
    line-height: 30px;
    background-color: #f8f8f8;
    border-radius: 4px;
    font-size: 20px;
    padding: 10px;
    box-shadow: 0 0 4px #c7c7c7;
    }
    .main_article > article > div{
         display: flex;
        justify-content: space-between;
    }
    .operation_btns{
        width: 80px;
        text-align: center;
        border-radius: 4px;
        padding: 7px 0px;
        display: inline-block;
        text-decoration: none;
        background-color: #ff0d0d;
        color: white;
        border: 1px solid #ff0d0d;
    }
    .update{
        background-color: #2020ff;
        border: 1px solid #2020ff;
    }
    .operation_btns:hover{
        transition: 0.4s;
        background-color: white;
        color: black;
        text-decoration: none;
    }
</style>
<main class="main_article" >
    <article>
        <h1><?= $model->title ?></h1>
        <p><?= $model->text ?></p>
       <div>
           <h4>Author : <?= $model->author ?></h4>
           <h4>Created_at : <?= date('y,m,d' , $model->created_at) ?></h4>
       </div>
    </article>
    <a class='operation_btns' href="http://localhost/articles/delete/<?= $model->id ?>" >Delete</a>
    <a class='operation_btns update' href="http://localhost/articles/update/<?= $model->id ?>" >update</a>

</main>




