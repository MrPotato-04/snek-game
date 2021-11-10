<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./../../common_style/fonts.css">
    <link rel="stylesheet" href="./styles/registerPageStyle.css">
    <title>Register</title>
    <script>
        function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
            var y = document.getElementById("repass");
            if (y.type === "password") {
                y.type = "text";
            } else {
                y.type = "password";
            }
        }
    </script>
</head>

<body>
    <?php
    session_start();
    if (isset($_SESSION['errors'])) {
        $error_output = $_SESSION['errors'];
        echo $error_output;
        unset($_SESSION['errors']);
    }
    ?>
    <form action="register.php" method="POST" enctype="multipart/form">

        <h2>Snek on crack</h2>
        <p>Register</p>
        <div class="container">
            <label for="email"><b>Email</b></label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email">

            <label for="name"><b>User Name</b></label>
            <input type="text" name="username" class="form-control" id="username" placeholder="Username">

            <label for="password"><b>Password</b></label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" required  minlength="6">
            <label for="repass"><b>Confirm Password</b></label>
            <input type="password" name="repass" class="form-control" id="repass" placeholder="Confirm Password" required>
            <input type="checkbox" onclick="myFunction()">Show Passwords

            <button type="submit" name="button" value="Register">Register</button>
            <button type="button" onclick="window.location.href='./../login/index.php'" class="signup">
                Log in
            </button>
            <!--FIXME: <a href="">Forgot your password? </a> -->


        </div>





    </form>
</body>

</html>


<!-- 
<form action="register.php" method="post" enctype="multipart/form">
            <input type="text" name="email" placeholder="Email">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <input type="password" name="repass" placeholder="Confirm Password">
            <input type="submit" name="button" value="Register">
        </form> -->