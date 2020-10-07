<style>
    .main_footer {
        background-color: #c4c4c4;
        box-shadow: 0 0 4px #bbbbbb;
        margin: 0 auto;
    }
    .main_footer>section {
        display: flex;
        padding: 10px 30px;
        align-items: center;
        justify-content: center;
    }
    .article_footer {
        width: 50%;
    }
    .contact_footer{
        width: 50%;
        padding:0 0 0 50px;
    }
    .contact_footer>ul:nth-of-type(1) {
        list-style-type: none;
        font-size: 40px;
    }
    .contact_footer > ul:nth-of-type(1) > li{
        display: inline-block;
    }
    .contact_footer >ul:nth-of-type(2){
        list-style-type: none;
    }
    .terms{
        background-color: #6e6e6e;
        display: flex;
        justify-content: space-between;
        padding: 5px 50px;
    }
    .terms > a{
        color: white;
    }
</style>
<footer class="main_footer">
    <section>
        <article class="article_footer">
            <h2>Lorem ipsum dolor sit amet</h2>
            <p>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. At laudantium numquam esse incidunt fugiat sit est optio distinctio accusantium vel. Labore eveniet voluptatem a porro illum facere esse sint minus!
            </p>
        </article>
        <div class="contact_footer">
            
            <ul>
                <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                <li><a href="#"><i class="fab fa-youtube"></i></a></li>
            </ul>
            <ul>
                <li>Tel:0987654321</li>
                <li>Address:Lorem Ipsum,lorem 40587</li>
            </ul>
        </div>
    </section>
    <div class="terms" >
        <a href="#">WebsitePolicies © 2020</a>
        <a href="#">Terms and Privacy</a>
    </div>
</footer>