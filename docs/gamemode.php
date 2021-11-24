<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Snek on Crack</title>
    <link rel="icon" type="image/x-icon" href="favicon-32x32">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="/snek-game/node_modules/jquery/dist/jquery.js?v=1"></script>
    <link rel="stylesheet" href="./styles/css/gamemode.css?v=1">
    <link rel="stylesheet" href="./../common_style/menu.css?v=1">
    <link rel="stylesheet" type="text/css" href="/snek-game/common_style/fonts.css?v=1">
    <script src="./snekScript/gamemode.js?v=1" defer type="module"></script>
    <script src="./snekScript/burger.js?v=1" defer type="module"></script>
    <script src="./snekScript/snakecolor.js?v=1" defer type="module"></script>
    <link rel="icon" href="data:;base64,iVBORw0KGgo=">
    
    <script type="module">
        $('#settings').hide();
    </script>
</head>

<body>

    <div id="wrapper"><?php require_once("./../common_style/header.php") ?>
        <div class="main_content"><?php include_once('./../common_style/menu.php') ?>
            <div class="buttons show">
                <h1>Gamemodes</h1>
                <?php
                if ($userID !== null) {
                    echo "<div class=\"buttons-mid\"><button id=\"button-multiplayer\">Multiplayer</button></div><div class=\"buttons-mid\"><button id=\"button-singleplayer\">Singleplayer</button></div><div class=\"buttons-mid\"><button id=\"button-speed\">User Speed</button></div><div class=\"buttons-mid\"><button id=\"button-faster\">Faster!</button></div><div class=\"buttons-mid\"><button id=\"showSettings\">Settings</button></div><div class=\"buttons-mid\"><button id=\"start\">Start</button></div>";
                } else {
                    if (!isset($_COOKIE["demo"])) {
                        echo "<div class=\"buttons-mid\"><button id=\"button-singleplayer\">Singleplayer</button></div><div class=\"buttons-mid\"><button id=\"button-login\">Login</button></div><div class=\"buttons-mid\"><button id=\"showSettings\">Settings</button></div><div class=\"buttons-mid\"><button id=\"start\">Start</button></div>";
                    } else {
                        echo "<div class=\"buttons-mid\"><button id=\"button-login\">Login</button></div>";
                    }
                }
                ?>
            </div><div id="settings"">
                <div class=" buttons-mid">
                <div class="fill">
                    <h1>Settings</h1>
                </div>
                <div class="snakecolor2">
                    <h2>Set Snake 1 color</h2>
                    <br>
                    <img id="snake-1-Preview" src="./styles/snake/snake/tile003.png"></img>
                    <br>
                    <input type="range" min="1" max="360" value="180" class="slider" id="snake-1-ColorSlider">
                    <br>
                    <button style="width: 10vw; height: 6vh;" id="submit-color-1">Confirm</button>
                </div>
                <br>
                <div class="snakecolor1">
                    <h2>Set Snake 2 color</h2>
                    <br>
                    <img id="snake-2-Preview" src="./styles/snake/snake/tile003.png"></img>
                    <br>
                    <input type="range" min="1" max="360" value="180" class="slider" id="snake-2-ColorSlider">
                    <br>
                    <button style="width: 10vw; height: 6vh;" id="submit-color-2">Confirm</button>
                </div>
            </div>
        </div>
    </div>

    <div class="wrapper-footer">
        <?php include_once("./../common_style/footer.php"); ?>
    </div>

    </div>
    <script>
        let bool = false;
        $(document).ready(function() {
            $('#showSettings').on('click', function() {
                if (bool) {
                    $('#settings').show().fadeOut('slow');
                    console.log("ssssssss")
                    bool = !bool
                } else {
                    $('#settings').hide().fadeIn('slow');
                    bool = !bool
                }
            })
        })
        $(document).ready(function() {
            $('#logout').on('click', function() {
            document.cookie = "userid=${<?php echo $userID ?>}; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
            window.location.reload();
        })
        })
        
    </script>
</body>

</html>