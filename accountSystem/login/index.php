
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="login.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
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
    <form action="login.php" method="POST" enctype="multipart/form">
        <input type="text" autocomplete="off" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <input type="submit" name="button" value="Sign in">
    </form>
<button onclick="myFunction()">Toggle dark mode</button>
    <div>
        <p>No account yet? Register </p> <a href="./../register/registerPage.php">here</a>
    </div>
<script src="login.js"></script>
</body>
</html>