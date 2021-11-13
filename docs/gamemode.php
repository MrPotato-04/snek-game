<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>snekgame</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="/snek-game/node_modules/jquery/dist/jquery.min.js?v=1"></script>
    <link rel="stylesheet" href="./styles/css/gamemode.css?v=1">
    <link rel="stylesheet" href="./../common_style/menu.css?v=1">
    <link rel="stylesheet" type="text/css" href="/snek-game/common_style/fonts.css?v=1">
    <script src="./snekScript/gamemode.js?v=1" defer type="module"></script>
    <script src="./snekScript/burger.js?v=1" defer type="module"></script>
    <script src="./snekScript/snakecolor.js?v=1" defer type="module"></script>
    <link rel="icon" href="data:;base64,iVBORw0KGgo=">
</head>

<body>

    <div id="wrapper">
        <div id="header" class="header">
            <?php require_once("./../common_style/header.php") ?>
        </div>
        <div class="main_content">
            <?php include_once('./../common_style/menu.php') ?>
            <div id="settings">
                <div class="buttons-mid">
                    <div class="fill"><h1>Settings</h1></div>
                    <h2>Set Snake color</h2>
                    <br>
                    <img id="snakePreview" src="./styles/snake/snake/tile003.png"></img>
                    <br>
                    <input type="range" min="1" max="360" value="180" class="slider" id="snakeColorSlider">
                    <br>
                    <button style="width: 10vw; height: 6vh;" id="submit-color-1">Confirm</button>
                    
                </div>
            </div><div class="buttons show">
            <h1>Gamemodes</h1>
                <?php
                if ($userID !== null) {
                    echo "<div class=\"buttons-mid\"><button id=\"button-multiplayer\">Multiplayer</button></div><div class=\"buttons-mid\"><button id=\"button-singleplayer\">Singleplayer</button></div><div class=\"buttons-mid\"><button id=\"button-speed\">User Speed</button></div><div class=\"buttons-mid\"><button id=\"button-faster\">Faster!</button></div>";
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