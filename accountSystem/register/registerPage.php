<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./registerPageStyle.css">
    <title>Register</title>
</head>
<body>
    <?php
    session_start();
    if(isset($_SESSION['errors'])){
        $error_output = $_SESSION['errors'];
        echo $error_output;
        unset ($_SESSION['errors']);
    }
    ?>
    <div class="center">
        <form action="register.php" method="post" enctype="multipart/form">
            <input type="text" name="email" placeholder="Email">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <input type="password" name="repass" placeholder="Confirm Password">
            <input type="submit" name="button" value="Register">
        </form>
    </div>
</body>
</html>