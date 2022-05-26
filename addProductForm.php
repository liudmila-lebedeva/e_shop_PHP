<?php
include_once './config.php';


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/style.css">
        <title></title>
    </head>
    <body>
        <h1>Add a new product here</h1>
        <form action="saveProduct.php" method="post" enctype="multipart/form-data">
            Name: <input type="text" name="name">
            <br>
            Price: <input type="text" name="price">
            <br>
            Description <textarea name="description" rows="5" cols="30"></textarea>
            <br>
            Product image: <input type="file" name="image" accept="image/*">
            <br>
            <input type="submit" value="Send">
        </form>
    </body>
</html>

