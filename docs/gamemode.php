<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>snekgame</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="/node_modules/jquery/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="styles/gamemode.css">
    <link rel="stylesheet" type="text/css" href="/common_style/fonts.css">
    <script src="snekScript/gamemode.js" defer type="module"></script>

</head>

<body>
    <?php
    $userID = null;
    if (isset($_COOKIE['userid'])) {
        $userID = $_COOKIE["userid"];
    }
    if (isset($_POST["logout"])) {
        unset($_COOKIE['userid']);
        setcookie('userid', null, -1, "/");
        header("Location: index.php");
    }
    if ($userID === null) {
        //do nothing
    } else {
        // session_start();
        $dbc = require "./../database/db.php";
        $res_image = $dbc->query("SELECT * FROM  `profile-images` WHERE `user_iduser` = $userID");
        $image_result = $res_image->fetch_assoc();
        $pfpicture = $image_result['image'];

        $res = $dbc->query("SELECT * FROM  `user` WHERE `iduser` = $userID");
        $row = $res->fetch_assoc();
        $username = $row['username'];
    };
    ?>
    <div id="wrapper">
        <div class="header">
            <div class="inner_header">
                <h3>Snek on crack</h3>
                <button id="hamburger" class="hamburger">
                    <span class="burger"></span>
                    <span class="burger"></span>
                    <span class="burger"></span>
                </button>
            </div>
        </div>
        <div class="main_content">
            <div class="content">
                <div class="flex">
                    <nav>
                        <ul id="links" class="navigation">
                            <?php if ($pfpicture !== null) { echo "<li><a href=\"/accountSystem/userinfo/userinfo.php\"><img src=\"./../$pfpicture\" alt=\"Avatar\" class=\"avatar\"><h1>Welcome $username</h1></a></li>"; }; ?>
                            <li><a href="/index.php">Home</a></li>
                            <li><a href="/accountSystem/userinfo/userinfo.php">Account</a></li>
                            <li><a href="leaderboards/leadpage.php">Leaderboard</a></li>
                            <?php
                            if ($userID !== null) {
                                echo "<li><form action=\"gamemode.php\" method=\"post\" id=\"logout\"><input type=\"hidden\" name=\"logout\" value=\"Gamemodes\"><a href=\"javascript:{}\" onclick=\"document.getElementById('logout').submit(); return false;\">Logout</a></form></li>";
                            } else {
                                echo "<li><a href=\"accountSystem\login\index.php\">Login</a></li>";
                            }
                            ?>
                            <!-- <li><a href="#0">placeholde</a></li>
                            <li><a href="./../contact.php">Our Team</a></li> -->
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="buttons show">
                <?php
                if ($userID !== null) {
                    echo "<div class=\"buttons-mid\"><button id=\"button-multiplayer\">Multiplayer</button></div><div class=\"buttons-mid\"><button id=\"button-singleplayer\">Singleplayer</button></div><div class=\"buttons-mid\"><button id=\"button-speed\">User Speed</button></div>";
                } else {
                    if (!isset($_COOKIE["demo"])) {
                        echo "<div class=\"buttons-mid\"><button id=\"button-singleplayer\">Singleplayer</button></div><div class=\"buttons-mid\"><button id=\"button-login\">Login</button></div>";
                    } else {
                        echo "<div class=\"buttons-mid\"><button id=\"button-login\">Login</button></div>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <div class="wrapper-footer">

        <footer>
        </footer>

    </div>

</body>

</html>