<style>
    .main_menu{
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 20%;
        background-color: #f2f2ff;
        box-shadow: 0 0 4px #d2d2ff;
    }
    .main_menu > ul:nth-of-type(1){
        display: flex;
        list-style-type: none;
        justify-content: space-between;
        align-items: center;
        width: 500px;
        font-size: 20px;
    }
    .main_menu > ul:nth-of-type(1) > li{
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: 0.4s;
        border-radius: 4px;
    }
    .main_menu > ul:nth-of-type(1) > li:hover{
        background-color: #adb4f5;
        box-shadow: 0 0 5px #c6c6c6;
        color: white;
        margin: 8px;
        cursor: pointer;
    }
    .main_menu > ul:nth-of-type(1) > li > a{
        text-decoration: none;
        color: #4a4a4a;
    }
    .main_menu > div > h2{
       color: #4a4a4a;
        text-shadow: 0 0 5px #c6c6c6 ;
        font-size: 40px;
        font-weight: 500;
    }


    .usermenu{  
        padding: 0 30px;
        display: flex;
        list-style-type: none;
        justify-content: space-between;
    }

    .usermenu > li{
        margin-top: -60px;
        font-size: 30px;
    }
</style>


<nav class="main_menu" >
    <div>
        <h2>LOGO</h2>
    </div>
    <ul>
        <li><a href="http://localhost/articles" >Home</a></li>
        <li><a href="http://localhost/articles/articles" >Articles</a></li>
        <li><a href="http://localhost/articles/about" >About</a></li>
        <?php if ($isGuest){ ?>
            <li><a href="http://localhost/articles/signup" >Signup</a></li>
        <?php } ?>
        <li><a href="http://localhost/articles/<?php echo ($isGuest) ? 'login' : 'logout' ; ?>" ><?php echo ($isGuest) ? 'Login' : 'Logout' ; ?></a></li>
    </ul>
</nav>
<?php if (!$isGuest){ ?>
    <ul class="usermenu" >
        <li><a href="http://localhost/articles/insert"><i class="fas fa-plus"  ></i></a></li>
        <li><a href="http://localhost/articles/profile"><i class="fas fa-user-circle"  ></i></a></li>
    </ul>
    <?php } ?>
