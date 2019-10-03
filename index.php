<?php 

    session_start(); 

    require "includes/config.php";
    require "includes/db.php";

    //---------------------------------------------------------------------------------------
    //--------------------------------Каталоги-----------------------------------------------
    //---------------------------------------------------------------------------------------
    $result_flw = mysqli_query($connection, "SELECT * FROM `products` WHERE categorie_id = 1");
    $result_bqt = mysqli_query($connection, "SELECT * FROM `products` WHERE categorie_id = 2");
    $result_othr = mysqli_query($connection, "SELECT * FROM `products` WHERE categorie_id = 3");
    $result_act = mysqli_query($connection, "SELECT * FROM `products` WHERE categorie_id = 4");
    //---------------------------------------------------------------------------------------
    //--------------------------------Все формы----------------------------------------------
    //---------------------------------------------------------------------------------------
    $result_email = mysqli_query($connection, "SELECT * FROM `all_forms` WHERE id=1");
    $cat_email = mysqli_fetch_assoc($result_email);
    $result_phone = mysqli_query($connection, "SELECT * FROM `all_forms` WHERE id=2");
    $cat_phone = mysqli_fetch_assoc($result_phone);
    $result_zagolovok_na_glavnoy = mysqli_query($connection, "SELECT * FROM `all_forms` WHERE id=3");
    $cat_zagolovok_na_glavnoy = mysqli_fetch_assoc($result_zagolovok_na_glavnoy);
    $result_text_na_glavnoy = mysqli_query($connection, "SELECT * FROM `all_forms` WHERE id=4");
    $cat_text_na_glavnoy = mysqli_fetch_assoc($result_text_na_glavnoy);
    $result_phone_and_email_in_contacs = mysqli_query($connection, "SELECT * FROM `all_forms` WHERE id=5");
    $cat_phone_and_email_in_contacs = mysqli_fetch_assoc($result_phone_and_email_in_contacs);
    $result_address = mysqli_query($connection, "SELECT * FROM `all_forms` WHERE id=6");
    $cat_address = mysqli_fetch_assoc($result_address);
    //---------------------------------------------------------------------------------------
    
?>
    <!DOCTYPE html>
    <html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Flowers</title>
        <script src="js/jquery-3.4.1.min.js"></script>
        <script src="js/myCart.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Lato:700i|Roboto:100,300,400,500,700,900&display=swap&subset=cyrillic" rel="stylesheet">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="style.css">
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    </head>
    <body onLoad="showMyCart()">
        <div class="container">
           <div class="firstPage">
                <section class=left>
                    <div class="lang"><a href="№">Eng</a></div>
                    <div class="email"><a href="#"><?php echo $cat_email['value']; ?></a></div>
                    <div class="phone"><a href="tel:<?php echo $cat_phone['value'];?>"><?php echo $cat_phone['value'];?></a></div>
                    <div class="cart"><a href="checkout.php"><p>1</p><img src="img/shoppingCart.png" alt="download"></a></div>
                </section>
                <header>
                    <img src="img/logo.png" alt="loading" class="logo">
                    <div class="nav" id="nav">
                        <ul class="wow bounceInDown">                            
                                <li><a href="/">Главная</a></li>
                                <li><a href="#yak1">Каталог</a></li>
                                <li><a href="#yak2">Акции</a></li>
                                <li><a href="#yak3">Контакты</a></li>                            
                        </ul>
                    </div>
                </header>
                <div class="text wow slideInUp">
                    <h1>
                        <?php echo $cat_zagolovok_na_glavnoy['value'];?>
                    </h1>
                    <p class="frst">
                        <?php echo $cat_text_na_glavnoy['value'];?>
                    </p>
                    <p class="scndpr">
                        <?php echo $cat_address['value'];?>
                    </p>
                    <a href="#" class="reviews">Отзывы</a>
                </div>
    
            </div>     
        </div>
        <div class="containercat">
        <div class="catalog">
            <section class=leftcat>
                    <p class="titlectlg">Каталог</p>
            </section>
            <div class="ctlg" id="yak1">
                <h2>
                    Цветы:
                </h2>
                <div class="var">
                    <?php
                        while(  ($cat_flw = mysqli_fetch_assoc($result_flw)))
                        {
                            echo '<div class="wow flipInX" data-wow-delay="200"> <a href="/article_flw.php?id=' . $cat_flw['id'] . '"><p>' . $cat_flw['name'] . '</p><p>' . $cat_flw['price'] . 'грн</p><img src="img/flowers/flwr/' . $cat_flw['img'] . '.jpg" alt="loading" height="100%" width="100%"></a></div>';
                        }
                    ?>
                </div>
                <h2>Букеты:</h2>
                <div class="var">
                    <?php
                        while(  ($cat_bqt = mysqli_fetch_assoc($result_bqt)))
                        {
                            echo '<div class="wow flipInX" data-wow-delay="200"> <a href="/article_bqt.php?id=' . $cat_bqt['id'] . '"><p>' . $cat_bqt['name'] . '</p><p>' . $cat_bqt['price'] . 'грн</p><img src="img/flowers/bqt/' . $cat_bqt['img'] . '.jpg" alt="loading" height="100%" width="100%"></a></div>';
                        }
                    ?>
                </div>
                <h2>Другое:</h2>
                <div class="var">
                    <?php
                        while(  ($cat_othr = mysqli_fetch_assoc($result_othr)))
                        {
                            echo '<div class="wow flipInX" data-wow-delay="200"> <a href="/article_othr.php?id=' . $cat_othr['id'] . '"><p>' . $cat_othr['name'] . '</p><p>' . $cat_othr['price'] . 'грн</p><img src="img/flowers/other/' . $cat_othr['img'] . '.jpg" alt="loading" height="100%" width="100%"></a></div>';
                        }
                    ?>
                </div>
            </div>
        </div>
        <hr>
    </div>
    <div class="containeract">
        <div class="catalog" id="yak2">
            <section class=leftcat>
                    <p class="titlectlg">Акции</p>
            </section>
            <div class="ctlg">
                <h2>
                    Акционные предложения:   
                </h2>
                <div class="var">
                    <?php
                        while(  ($cat_act = mysqli_fetch_assoc($result_act)))
                        {
                            echo '<div class="wow flipInX" data-wow-delay="200"> <a href="/article_act.php?id=' . $cat_act['id'] . '"><p>' . $cat_act['name'] . '</p><p>' . $cat_act['sale'] . 'грн</p><img src="img/flowers/act/' . $cat_act['img'] . '.jpg" alt="loading" height="100%" width="100%"></a></div>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php
        include "includes/footer.php"
    ?>


    </div>
<!--------------------------------------------------------------------------------------->
<!-------------------------Анимация прокрутки к якорям----------------------------------->
<!--------------------------------------------------------------------------------------->
<script type="text/javascript">
 $(document).ready(function(){
    $("#nav").on("click","a", function (event) {
        event.preventDefault();
        var id  = $(this).attr('href'),
            top = $(id).offset().top;
        $('body,html').animate({scrollTop: top}, 1500);
    });
});
</script>
<!--------------------------------------------------------------------------------------->
<!-------------------------Анимации------------------------------------------------------>
<!--------------------------------------------------------------------------------------->    
    <script src="js/wow.min.js"></script>
    <script >
        new WOW().init();
    </script>
</body>
</html>