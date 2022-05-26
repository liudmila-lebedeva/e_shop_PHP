<?php
//session_start();

include_once './config.php';

$name = filter_input(INPUT_POST, 'name');
$password = filter_input(INPUT_POST, 'password');

$con = connectDatabase();
$name = mysqli_real_escape_string($con, $name);
$password = mysqli_real_escape_string($con, $password);

$query = "SELECT * FROM users WHERE name='$name'";

$results = mysqli_query($con, $query);

$noRecords = mysqli_num_rows($results);

$usersArray = mysqli_fetch_all($results, MYSQLI_ASSOC);




mysqli_close($con);

if($noRecords > 0){
    $user = $usersArray[0];
    $hash = $user['password'];
    
    if($hash == crypt($password, $hash)){
        $_SESSION["userID"] = $user['id'];
        $_SESSION["userName"] = $user['name'];
        $_SESSION["isAdmin"] = $user['isAdmin'];
        header('Location: index.php');
    } else {
        header('Location: loginForm.php');
    }
    
   
} else {
    header('Location: index.php');
}




