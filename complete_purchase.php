<?php
//doing empty basket

session_start();

unset($_SESSION['cart']);

header("Location: index.php");



