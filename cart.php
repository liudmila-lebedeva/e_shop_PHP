<?php 
session_start();

if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
}else{
    $cart = [];
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Shopping Basket</h1>
        <?php
        foreach ($cart as $goods => $quantity){  // array as value // take the product and his quantity 
            echo "$goods * $quantity<br>";
        }
        ?>
    </body>
</html>
