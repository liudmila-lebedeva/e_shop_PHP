<?php

include_once './config.php';

$con = connectDatabase();



$id = filter_input(INPUT_GET, 'id');

$id = mysqli_escape_string($con, $id);




$query = "DELETE FROM data WHERE id='$id'";


mysqli_query($con, $query);

mysqli_close($con);

header('Location: index.php');

