<?php

include_once './config.php';

$id = filter_input(INPUT_POST, 'id');

$name = filter_input(INPUT_POST, 'name');
$description = filter_input(INPUT_POST, 'description');
$price = filter_input(INPUT_POST, 'price');

$con = connectDatabase();

$name = mysqli_real_escape_string($con, $name);
$description = mysqli_real_escape_string($con, $description);
$price = mysqli_real_escape_string($con, $price);


$query = "UPDATE data SET name='$name', description='$description', price='$price' WHERE id='$id'";



mysqli_query($con, $query);

mysqli_close($con);

header("Location: show_goods.php?key=$id");