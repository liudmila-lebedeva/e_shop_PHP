<?php

session_start();
 

$key = filter_input(INPUT_GET, 'key');

if (isset($_SESSION['cart'])) {  //if I have smth in the session - execute it
    $cart = $_SESSION['cart'];
} else {
    $cart = [];  //cart is empty
}


if (isset($cart[$key])) {   //if i have the thing in my basket
    $cart[$key]++; //увеличиваем по одному
} else {
    $cart[$key] = 1;  //if it doesnt exist yes, so it is one
}




$_SESSION['cart'] = $cart;  //put it back to the session, which is stored in the session file 

header("Location: index.php");
