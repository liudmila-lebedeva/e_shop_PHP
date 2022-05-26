<?php

session_start();

$key = $_GET['key'];

$changing = $_GET['changing'];

//we take the cart from the session

if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
} else {
    $cart = [];
}

//if i have the thing in my basket

if (isset($cart[$key])) {
    $cart[$key] = $cart[$key] + $changing;
    
    if ($cart[$key] <= 0) {   //do not go under zero
        unset($cart[$key]);
    }
} 
// after the changing we put it back to the session
$_SESSION['cart'] = $cart;  

header("Location: cart.php");  // come back to the cart page.