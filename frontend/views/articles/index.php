<?php
use richardfan\widget\JSRegister;
?>
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

    .viewport {
        overflow: hidden;
        margin-top: 50px;
        position: relative;
        height: 500px;
        display: flex;
        justify-content: space-between;
        align-items:center;
        padding: 0 10px;
    }

    .viewport >button{
        border: none;
        height: 50px;
        width: 50px;
        font-size: 50px;
        background-color: white;
    }

    .viewport > button:hover{
        color: #0a73bb;
        transition: 0.4s;
    }

    .slide {
        display: flex;
        flex-direction: column;
        background-color: #e7e7fc;
        box-shadow: 0 0 4px #cdcdcd;
        width: 80%;
        height: 400px;
        padding: 10px 20px;
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

    .after {
        left: 100%;
        opacity: 0;
        position: absolute;
        transition: 0.4s;
    }

    .before {
        right: 100%;
        opacity: 0;
        position: absolute;
        transition: 0.4s;
    }

    .active {
        left: 10%;
        right: 0;
        opacity: 1;
        position: absolute;
        transition: 0.4s;
        width: 80%;
        display: flex;
        flex-direction: column;
    }

    .slide>button {
        width: 100px;
        align-self: flex-end;
    }

</style>

<header class="main_header">
    <h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h2>
</header>
    <section class="viewport">
        <button class="back"> <i class="fas fa-chevron-left"></i></button>
        <?php
        $counter = 0;
        foreach ($articles as $key => $article) :
            $counter++;
            ?>
            <?= \frontend\widgets\ArticleWidget::widget(['counterr'=>$counter , 'article'=>$article])  ?>

        <?php   endforeach;   ?>

        <button class="next"> <i class="fas fa-chevron-right"></i></button>
    </section>

<?php JSRegister::begin(); ?>
<script>
    let count= document.getElementsByClassName('slide').length;
    let counter=0;
    $(".next").on('click', function() {
        let activeSlide = $('.active');
        if (counter < count-1) {
            counter++;
            activeSlide.next().removeClass('after').addClass('active');
            activeSlide.removeClass('active').addClass('before');
        }
    });

    $('.back').on('click', function() {

        let activeSlide = $('.active');
        if (counter > 0) {
            counter--;
            activeSlide.prev().removeClass('before').addClass('active');
            activeSlide.removeClass('active').addClass('after');
        }

    });
</script>
<?php JSRegister::end(); ?>