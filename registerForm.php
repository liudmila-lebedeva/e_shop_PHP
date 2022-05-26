<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/style.css">
        <title></title>
    </head>
    <body>
        <h1>Register</h1>
        <form action="register.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
            Name: <input name="name" required><br>
            Password: <input type="password" required name="password"><br>
            Email: <input type="email" required name="email"><br>
            
            <button type="submit">Register</button>          
        </form>
    </body>
</html>
