<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <form action="login.php" method="POST" enctype="multipart/form">
        <input type="text" autocomplete="off" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <input type="submit" name="button" value="Sign in">
    </form>
    <div>
        <p>No account yet? Register </p> <a href="./../register/registerPage.php">here</a>
    </div>
</body>
</html>