<?php
include_once './config.php';

$id = filter_input(INPUT_GET, 'id');

$con = connectDatabase();

$query = "SELECT * FROM data WHERE id='$id'";

$results = mysqli_query($con, $query);

$product = mysqli_fetch_array($results);

if (!$product) {
    header('Location: index.php');
    exit();
}


mysqli_close($con);
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    
        <h1>Edit product cart here</h1>



        <form action="saveEditedProduct.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $id ?>">
            Name: <input type="text" name="name" value="<?= $product['name'] ?>">
            <br>
            Price: <input type="text" name="price" value="<?= $product['price'] ?>">
            <br>
            Description <textarea name="description" rows="5" cols="30"><?= $product['description'] ?></textarea>
            <br>
            Product image: <input type="file" name="image" accept="image/*" >
            <br>
            <input type="submit" value="Send" onclick="return confirm('are you sure you want to change this item?')">
        </form>
    </body>
</html>
