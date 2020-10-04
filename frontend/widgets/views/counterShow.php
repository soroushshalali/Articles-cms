<?php

use richardfan\widget\JSRegister;
?>
<style>
    .counter_show {
        font-size: 70px;
        font-weight: 900;
        text-align: center;
        margin: 20px 0;
        text-shadow: 0 0 4px #b1b1b1;
    }

    .counter_show>span:nth-of-type(1) {
        width: 100px;
        display: inline-block;
    }
</style>
<div class="counter_show">
    <span></span>
    <span>Articles</span>
</div>
<?php JSRegister::begin(); ?>
<script>
    let maxNumber = <?= $count  ?>;
    let number = 0;
    let interval = setInterval(numberShow, 70);

    function numberShow() {
        number++;
        $('.counter_show > span:nth-of-type(1)').text(number);
        if (number == maxNumber) {
            clearInterval(interval);
        }
    }
</script>
<?php JSRegister::end(); ?>