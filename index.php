<?php
include_once 'data.php';
$loaded = load_goods();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        
        <a href="cart.php" title="Check my Shopping Bag"><img src="https://img.icons8.com/ios/50/000000/shopping-cart.png"/></a>
       
        <a href="complete_purchase.php" title="Complete my Purchase"><img src="https://img.icons8.com/ios-filled/50/000000/return-purchase.png"/></a><br><br>

        <h1>Hello, dear customer</h1>
        <h2>Enjoy your shopping</h2>
        <?php foreach ($loaded as $key => $name) : ?>
        
        <div class="single-goods">
            <img src="images/<?= $key ?>.jpg" alt="alt"/>
            <a href="show_goods.php?key=<?=$key?>" class="name_prod"><?=$name?></a><br>
            <a href="purchase.php?key=<?= $key ?>"class="move_to_basket">Move to Basket</a>
        </div>
            
        <?php endforeach;
        ?>
        <br>



    </body>
</html>

<!--
try { 
    session_start(); 
} catch (Exception $e) { 
    echo $e->getMessage('lala'); 
}-->