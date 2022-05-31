<?php
include_once './config.php';

if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
} else {
    $cart = [];
}

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
<!DOCTYPE html>
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
        <h1>Shopping Basket</h1>
        <table id="table-basket">
            <tr>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Change the order</th>

            </tr>


            <?php
            $total = 0;
            foreach ($cart as $key => $quantity) {  // array as value // take the product and his quantity 
                $goods = get_goods($key);
                $name = $goods['name'];
                $price = $goods['price'];
                $subtotal = $price * $quantity;
                $total = $total + $subtotal;
                ?>
                <tr>
                    <td><?= $name ?><img src="images/<?= $key ?>.jpg" alt="alt" width="64"/></td>
                    <td><?= $quantity ?></td>
                    <td><?= $subtotal ?></td>
                    <td>
                        <a href="change_order.php?key=<?= $key ?>&changing=1"><button> + </button></a>
                        <a href="change_order.php?key=<?= $key ?>&changing=-1"><button> —  </button></a>
                    </td>

                </tr>
            <?php }
            ?>
            <tr>
                <td>Total Price</td>
                <td></td>
                <td><?= $total ?></td>
                <td></td>
            </tr>

        </table>



        <br>
        <a href="complete_purchase.php"><button class="moving_btn">Complete Purchase</button></a>
        <br>
        <a href="index.php"><button class="moving_btn">Continue Shopping</button></a>
        
        
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
