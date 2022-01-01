<?php
include_once 'data.php';

$key = $_GET['key'];  //how to obtain the key
$goods = get_goods($key); // how to obtain goods
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <!--here we present the items-->
        <img src="images/<?= $key ?>.jpg" alt="alt"/>
        <h1>Product details</h1>
        <h2><?= $goods['name'] ?></h2>
        <h3><?= $goods['description'] ?></h3>
        <h3>Price: <?= $goods['price'] ?></h3>
        <a href="purchase.php?key=<?= $key ?>"class="move_to_basket">Move to Basket</a><br>
        <a href="index.php"><button class="moving_btn">Continue Shopping</button></a>
        <?php
        ?>
    </body>
</html>
