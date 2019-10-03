<?php 

    require "includes/config.php";
    require "includes/db.php";


    $result_act = mysqli_query($connection, "SELECT * FROM `products` WHERE id =" . $_GET['id']);
    $cat_act = mysqli_fetch_assoc($result_act);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BuyPage</title>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/myCart.js"></script>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/animate.css">
</head>
<body>
    <div class="containerBuy">

        <div class="buyPage">
             <section class=leftBuy>
                 <div class="lang"><a href="#">Eng</a></div>
                 <p class="titlectlg">"<?php echo $cat_act['name']; ?>"</p>
                 <a  href="checkout.php" class="cart"><img src="img/shoppingCart.png" alt="download"></a>
             </section>
            <?php 
                include "includes/header.php"
            ?>
            <section class="buyCnt">
                <div class="buyFlwCnt">
                <div>
                    <img class="buyFlwrImg wow flipInX" src="img/flowers/other/<?php echo $cat_act['img']; ?>.jpg" alt="loading" height="350px" width="350px">
                </div>
                <div class="wow bounceInRight">
                    <div class="buyFlwBuy">
                        <div class="buyFlwCost">
                            <p><?php echo $cat_act['price']; ?> uah</p>
                        </div>
                        <div class="buyBtn">
                                <a href="cart.html" class="btnBuy">Купить в 1 клик</a>
                        </div>
                    </div>
                    <div class="addToCart">
                        <a href="#" class="btnBuy" onClick="addToCart(<?php echo $cat_act['id'];?>)">Добавить в корзину</a>
                        <input type=button value="В корзну" onClick="addToCart(<?php echo $cat_act['id'];?>)">
                    </div>
                    <div class="size">
                        <p><?php echo $cat_act['sale']; ?></p>
                        <p class="productCode">Код товара:1488</p>
                    </div>
                </div>
            </div>

            </section>
            <div class="buyTitle wow fadeInUp">
                    <h3>Описание:</h3>
                    <p><?php echo $cat_act['description']; ?></p>
                </div>
        </div>     
    </div>
    <?php 
        include "includes/footer.php"
    ?>
        <script src="js/wow.min.js"></script>
    <script >
        new WOW().init();
    </script>
</body>
</html>