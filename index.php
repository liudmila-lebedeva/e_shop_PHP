<?php
include_once 'data.php';
$loaded = load_goods();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <a href="cart.php">Shopping Basket</a>
        <br>
        <a href="complete_purchase.php">Complete Purchase</a><br><br>

        <h1>Hello, dear customer</h1>
        <h2>Enjoy your shopping</h2>
        <?php foreach ($loaded as $key => $name) : ?>
            
            <a href="show_goods.php?key=<?=$key?>"><?=$name?></a><br>
        <?php endforeach;
        ?>
        <br>



    </body>
</html>
