<?php

session_start();

unset($_SESSION["userID"]);
unset($_SESSION["userName"]); 
unset($_SESSION["isAdmin"]);


header('Location: index.php');