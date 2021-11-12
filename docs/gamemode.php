<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>snekgame</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="/snek-game/node_modules/jquery/dist/jquery.min.js?v=1"></script>
    <link rel="stylesheet" href="./styles/css/gamemode.css?v=1">
    <link rel="stylesheet" type="text/css" href="/snek-game/common_style/fonts.css?v=1">
    <script src="./snekScript/gamemode.js?v=1" defer type="module"></script>
    <link rel="icon" href="data:;base64,iVBORw0KGgo=">
</head>

<body>

    <div id="wrapper">
        <div id="header" class="header">
            <?php require_once("./../common_style/header.php") ?>
        </div>
        <div class="main_content">
            <?php include_once('./../common_style/menu.php') ?>
            <div class="buttons show">
                <?php
                if ($userID !== null) {
                    echo "<div class=\"buttons-mid\"><button id=\"button-multiplayer\">Multiplayer</button></div><div class=\"buttons-mid\"><button id=\"button-singleplayer\">Singleplayer</button></div><div class=\"buttons-mid\"><button id=\"button-speed\">User Speed</button></div><div class=\"buttons-mid\"><button id=\"button-multiplayer\">Multiplayer</button></div>";
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
        <div class="wrapper-footer">
        <?php include_once("./../common_style/footer.php"); ?>
        </div>

    </div>
    
</body>

</html>