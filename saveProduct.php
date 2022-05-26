<?php
include_once './config.php';



$name = filter_input(INPUT_POST, 'name');
$description = filter_input(INPUT_POST, 'description');
$price = filter_input(INPUT_POST, 'price');

$con = connectDatabase();
$name = mysqli_real_escape_string($con, $name);
$description = mysqli_real_escape_string($con, $description);
$price = mysqli_real_escape_string($con, $price);

$query = "INSERT INTO data (name, description, price) VALUES ('$name', '$description', '$price')";


mysqli_query($con, $query);

$id = mysqli_insert_id($con);

$file = "images/$id.jpg"; 
mkdir($folder); //create folder


move_uploaded_file($_FILES["image"]["tmp_name"], $file);



mysqli_close($con);

header('Location: index.php');