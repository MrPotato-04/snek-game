<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/snek-game/common_style/fonts.css">
    <link rel="stylesheet" type="text/css" href="./styles/login.css">
    <script>
        function mySubmit(obj) {
            var pwdObj = document.getElementById('password');
            var hashObj = new jsSHA("SHA-512", "TEXT", {numRounds: 1});
            hashObj.update(pwdObj.value);
            var hash = hashObj.getHash("HEX");
            pwdObj.value = hash;
            console.log(pwdObj.value)
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jsSHA/2.0.2/sha.js"></script>
</head>
    <body>
        <form action="login.php" method="POST" enctype="multipart/form">
            <h2>Snek on crack</h2>
            <p>Sign in</p>
            <div class="container">

                <label for="email"><b>Email</b></label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">

                <label for="name"><b>Password</b</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>

                        <button type="submit" onclick="mySubmit(this)">Login</button>
                        <button type="button" onclick="window.location.href='/snek-game/accountSystem/register/registerPage.php'" class="signup">
                            Sign Up
                        </button>
                        <!--//FIXME: <a href="./resetpassword.php">Forgot your password? </a> -->
            </div>
        </form>
    </body>
</html>