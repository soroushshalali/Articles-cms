<style>
    .main_header {
        box-shadow: 0 0 4px #727272;
        padding: 20px 0;
        color: white;
        text-align: center;
        background-size: 50%;
        background-image: url("https://images.unsplash.com/photo-1488866022504-f2584929ca5f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1343&q=80");
    }

    .main_header>h2 {
        font-size: 30px;
        text-shadow: 0 0 2px white;
    }

    .foot {
        background-image: url("https://images.unsplash.com/photo-1559890165-1ef92f415672?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=808&q=80");
    }

    .foot>h2 {
        text-shadow: 0 0 2px white;
    }

    .background{
        background-image: url('https://images.unsplash.com/photo-1467951591042-f388365db261?ixlib=rb-1.2.1&auto=format&fit=crop&w=1500&q=80');
        height: 200px;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        background-attachment: fixed;
        box-shadow: 0 0 4px #727272;

    }
</style>

<header class="main_header">
    <h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h2>
</header>
<?= \frontend\widgets\CounterShow::widget(['count' => $count])  ?>

<div class="background" >

</div>

<?= \frontend\widgets\ArticleWidget::widget(['articles' => $articles])  ?>

<header class="main_header foot">
    <h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h2>
</header>