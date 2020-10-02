<?php

use richardfan\widget\JSRegister;
?>


<style>
    .searchbar {
        text-align: center;
        width: 60%;
        margin: 20px auto;
        
    }

    .searchbar>input[type='text'] {
        width: 80%;
        font-size: 20px;
        border: none;
        background-color: rgb(202, 202, 202);
        padding: 10px 5px;
        box-shadow: 0 0 4px #cfcfcf;
        border-radius: 4px;
    }

    .searchbar>a {
        margin-left: -60px;
        background-color: rgba(202, 202, 202 , 0);
        border: none;
        color: white;
        font-size:20px;
    }
</style>


<div class="searchbar">
    <input type="text" class="input_search" placeholder="search . . .">
    <a class="search" ><i class="fas fa-search"></i></a>
</div>


<?php JSRegister::begin(); ?>
<script>
    $('.search').on('click' , function (){
        let valueForSearch=$('.input_search').val();
        if (valueForSearch !== ''){
            $('.search').attr('href', `http://localhost/articles/search/${valueForSearch}`);
        }
    });
</script>
<?php JSRegister::end(); ?>