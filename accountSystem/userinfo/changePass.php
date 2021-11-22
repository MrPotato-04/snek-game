<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="./../../common_style/fonts.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style/pass.css">
</head>
<script>
        function mySubmit(obj) {
            var pwdObj = document.getElementById('password');
            var hashObj = new jsSHA("SHA-512", "TEXT", {numRounds: 1});
            hashObj.update(pwdObj.value);
            var hash = hashObj.getHash("HEX");
            pwdObj.value = hash;
            console.log(pwdObj.value)

            var pwdObj = document.getElementById('repass');
            var hashObj = new jsSHA("SHA-512", "TEXT", {numRounds: 1});
            hashObj.update(pwdObj.value);
            var hash = hashObj.getHash("HEX");
            pwdObj.value = hash;
            console.log(pwdObj.value)
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jsSHA/2.0.2/sha.js"></script>
<body>
    <?php
        session_start();

        $userID = null;
        if (isset($_COOKIE['userid'])) {
            $userID = $_COOKIE["userid"];
        }
    
        $dbc = require './../../database/db.php';
        $res = $dbc->query("SELECT iduser, username, email, password FROM user WHERE iduser='{$userID}'");
        $row = $res->fetch_assoc();

        if (isset($_SESSION['errors'])) {
            $error_output = $_SESSION['errors'];
            echo $error_output;
            unset($_SESSION['errors']);
        }
    ?>
    <form action="passScript.php" method="post" enctype="multipart/form-data">
    <h2>New Password</h2>
        <input type="password" class="form-control" name="password" placeholder="New Password">
        <br>
        <input type="password" class="form-control" name="repass" placeholder="Confirm Password">
        <br>
        <button type="submit" onclick="mySubmit(this)">Submit</button>
    </form>
</body>
</html>