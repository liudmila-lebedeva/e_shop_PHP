<?php
session_start();
include_once 'data.php';


if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
} else {
    $cart = [];
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>

        <link rel="stylesheet" href="css/style.css">

    </head>
    <body>
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
                        <a href="change_order.php?key=<?=$key?>&changing=1"><button> + </button></a>
                        <a href="change_order.php?key=<?=$key?>&changing=-1"><button> —  </button></a>
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
        <br>
        <a href="complete_purchase.php"><button class="moving_btn">Complete Purchase</button></a>
        <br>
        <a href="index.php"><button class="moving_btn">Continue Shopping</button></a>

    </body>
</html>
