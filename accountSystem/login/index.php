<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="./styles/login.css">
</head>
    <body>
        <form action="login.php" method="POST" enctype="multipart/form">
            <h2>Snek on crack</h2>
            <p>Sign in</p>
            <div class="container">

                <label for="email"><b>Email</b></label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">

                <label for="name"><b>Password</b< /label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" minlength="4" required>

                        <button type="submit">Login</button>
                        <button type="button" onclick="window.location.href='./../register/registerPage.php'" class="signup">
                            Sign Up
                        </button>
                        <a href="./resetpassword.php">Forgot your password? </a>
            </div>
        </form>
    </body>
</html>