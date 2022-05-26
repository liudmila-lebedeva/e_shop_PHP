<?php
include_once 'config.php';

$current_page = filter_input(INPUT_GET, 'page');

if (!$current_page) {
    $current_page = 0;
}

$offset = $current_page * amount;

if ($current_page > 1) {
    $previous = $current_page - 1;
} else {
    $previous = 0;
}
$next = $current_page + 1;

$loaded = load_goods($current_page);

if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
} else {
    $cart = [];
}

$amount = 0;
foreach ($cart as $count) {
    $amount += $count;
}


$key = filter_input(INPUT_GET, 'key');
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div id="header">
            <div class="shopping_cart_icon">
                <a href="cart.php" title="Check my Shopping Bag"><img src="https://img.icons8.com/ios/50/000000/shopping-cart.png"/></a>
                <?= $amount ?>

                <a href="complete_purchase.php" title="Complete my Purchase"><img src="https://img.icons8.com/ios-filled/50/000000/return-purchase.png"/></a><br><br>
            </div>
            <div class="logo">
                <a href="index.php"><img src="images/lg.png"></a>
            </div>
            <div class="slogan">
                <h1>GreenShop</h1>
                <h2>Enjoy spring freshness whole year</h2>
            </div>
        </div>

        <div style="text-align: right">
            <?php if (isLogged()): ?>
                Hello,  <?= $_SESSION["userName"] ?> <br>
                <a href="addProductForm.php">Add a new product</a><br>

                <br>
                <a href="logout.php">Logout</a>
            <?php else: ?>
                <br>
                <a href="registerForm.php">Register</a>
                <br>
                <a href="loginForm.php">Login</a>
                <br>

            <?php endif; ?>
        </div>

        <div class="container">
            <?php foreach ($loaded as $key => $name) : ?>

                <div class="single-goods">
                    <img src="images/<?= $key ?>.jpg" alt="alt"/>
                    <h3><?= $name ?></h3>
                    <a href="show_goods.php?key=<?= $key ?>" class="name_prod">See details</a><br>
                    <a href="purchase.php?key=<?= $key ?>"class="move_to_basket">Move to Basket</a>
                </div>

            <?php endforeach;
            ?>
        </div>


        <div class="next_prev_page clear">
            <button class="grey_btn"><a href="index.php?page=<?= $previous ?>">Previous</a></button>
            <button class="grey_btn"><a href="index.php?page=<?= $next ?>">Next</a></button>

        </div>

        <div id="footer">
            <div class="logo">
                <a href="index.php"><img src="images/lg.png"></a>
            </div>
            <div class="slogan">
                <h3>GreenShop</h3>
                <p>Enjoy spring freshness whole year</p>
            </div>
            <div class="contacts">
                <h3>Contact us</h3>
                <p>85, rue Prince Jean, L-1111, Luxembourg</p>
                <p>+35262100000</p>
                <p>24/7</p>
            </div>
            
        </div>








    </body>
</html>

