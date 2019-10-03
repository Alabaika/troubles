<?php
    session_start();
    
    $mysqli = new mysqli('localhost', 'root' , '' , 'flower_db');
    $query = "set names utf8";
    $mysqli->query($query);
  //  require "includes/config.php";
  //  require "includes/db.php";
  //  $products_mysqli = mysqli_query($connection, "SELECT * FROM `products` ");
if(isset($_POST['action'])) {
    $action = $_POST["action"];
    switch ($action) {
        case 'show':
            if(!(isset($_SESSION['cart']))){
                echo 'У вас нет заказов';
                exit;
            };
            $cart = $_SESSION['cart'];
            if (count($cart) == 0){
                echo 'У вас нет заказов';
                exit;
            }
            echo '+';
            for($i =  0 ; $i < count($cart) ; $i++){
                $idProduct = $cart[$i]["idProduct"];
                $query = 'SELECT * FROM products where id = ' . $cart[$i]["idProduct"] . '';
                $results = $mysqli->query($query);
                while($row = $results->fetch_assoc()){
                    echo'
                    <div class="img-and-des">
                        <img src="../flowers/img/flowers/flwr/flower1.jpg" alt="" height="50px" width="50px">
                        <p class="cart-description">Букет “For my honey”</p>
                    </div>
                    <p class="cart-cost">' . $row["price"] . 'uah</p>
                    ';
                }
            }
            break;
        case 'add':
            $cart = $_SESSION['cart'];
            $id = $_POST['id'];
            $newProduct["idProduct"] - $id;
            $cart[count($cart)] = $newProduct;
            $_SESSION['cart'] = $cart;
            break;
        case 'del':
            $id = $_POST["id"];
            $newCart = array();
            $cart = $_SESSION['cart'];
            for ($i = 0; $i < count($cart); $i++){
                $idProduct = $cart[$i]["idProduct"];
                if ($id != $idProduct){
                }
            }
            break;
        default:
            echo "Uknown action";
    }
} else {
    echo "No action was provided";
}
?>
