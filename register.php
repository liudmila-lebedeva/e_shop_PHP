<?php

include_once './config.php';

$name = filter_input(INPUT_POST, 'name');
$password = filter_input(INPUT_POST, 'password');
$email = filter_input(INPUT_POST, 'email');

$con = connectDatabase();
$name = mysqli_real_escape_string($con, $name);
$password = mysqli_real_escape_string($con, $password);
$email = mysqli_real_escape_string($con, $email);

$salt_temp = str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ");
$salt = '$2a$10$' . substr($salt_temp, 0, 22);

$enc_password = crypt($password, $salt);

$query = "INSERT INTO users (name, password, email) VALUES ('$name','$enc_password','$email')";

mysqli_query($con, $query);

$id = mysqli_insert_id($con);

$source = $_FILES["avatar"]["tmp_name"];
$mimeType = exif_imagetype($source);
//var_dump($mimeType);
//exit();

if ($mimeType == IMAGETYPE_JPEG or $mimeType == IMAGETYPE_PNG or $mimeType == IMAGETYPE_GIF) {
    $dest = "./images/avatars/$id.png";
    if ($source != "") {
        move_uploaded_file($source, $dest);
// or equivalent rename($source, $dest);
    } else {
        mysqli_query($con, "DELETE FROM users WHERE id='$id'");
    }
}

mysqli_close($con);

header('Location: index.php');
