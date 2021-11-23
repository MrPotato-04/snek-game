<!DOCTYPE html>
<html lang="en">

<head>
    <script src="./../../node_modules/jquery/dist/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/snek-game/common_style/fonts.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="./style/userinfo.css">
    <link rel="stylesheet" href="/snek-game/common_style/header.css">
    <link rel="stylesheet" href="/snek-game/common_style/menu.css">
    <script defer type="module" src="./../../docs/snekScript/burger.js?v=1"></script>
</head>

<body>
    <div id="wrapper">
    <script>
        function changeData() {
            document.getElementById("email").removeAttribute("disabled");
        }
    </script>
    <?php
    session_start();

    $userID = null;
    if (isset($_COOKIE['userid'])) {
        $userID = $_COOKIE["userid"];
    }

    $dbc = require './../../database/db.php';
    $res = $dbc->query("SELECT iduser, username, email, `image` FROM user WHERE iduser='{$userID}'");
    $row = $res->fetch_assoc();
    $pfpicture = $row['image'];
    if ($pfpicture === null) {
        $pfpicture = 's';
    }

    if (!isset($_COOKIE['userid'])) {
        echo "you can't acces this page without logging in.";
    } else {
    ?>
        <?php
        include_once './../../common_style/header.php';
        include_once './../../common_style/menu.php';
        ?><form action="userscript.php" method="post">
            <h2>Profile</h2>
            <br>
            <div class="image-center">
                <?php echo "<img src=\"/snek-game/$pfpicture\"  class=\"\">"; ?><br>
            </div>
            <label for="UniqueID">Unique ID <br>
                <?php echo "<input class='form-control' type='text' value='" . $row['iduser'] . "' disabled>"; ?>
            </label>

            <label for="Username">Username <br>
                <?php echo "<input class='form-control' type='text' name='username' value='" . $row['username'] . "' disabled>"; ?>
            </label>

            <label for="Email">Email <br>
                <?php echo "<input id='email' class='form-control' type='email' name='email' value='" . $row['email'] . "' disabled>"; ?>
            </label>
            <div class="buttons">
                <button type="button" onclick="changeData()">Edit</button>

                <button type="submit">Save</button>

                <button type="button" class='small' onclick="window.location='changePass.php'">Change password</button>

                <button type="button" class='small' onclick="window.location='./profilePicture/index.php'">Change profile picture
            </div>
            <!-- <div class="form-control no-border">
            <a href="changePass.php">Change Password</a></div><div class="form-control no-border"><a href="./profilePicture/index.php">Change Profile Picture</a>
            </div> -->

        <?php
    }
        ?>
        </label>
        </form>
        <?php
        if (isset($_SESSION['errors'])) {
            $error_output = $_SESSION['errors'];
            echo $error_output;
            unset($_SESSION['errors']);
        }
        ?>
    </div>
</body>

</html>