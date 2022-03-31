<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Snek on Crack</title>
    <link rel="icon" type="image/x-icon" href="favicon-32x32">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/common_style/fonts.css?v=1">
    <link rel="stylesheet" href="./styles/css/main.css?v=1">
    <link rel="stylesheet" href="./styles/css/snake1.css?v=1">
    <link rel="stylesheet" href="./styles/css/snake2.css?v=1">
    <link rel="stylesheet" href="./../common_style/menu.css?v=1">
    <script src="snekScript/game.js?v=1" defer type="module"></script>
    <link rel="stylesheet" href="/common_style/header.css">


</head>

<body>
    <div id="wrapper">

        <?php require_once("./../common_style/header.php") ?>
        
        <div class="wrapper2">
            <?php include_once('./../common_style/menu.php') ?>
            <div id="game-board" class="game-board"></div>
            <div id="preload">
                <img src="./../snake/snake/tile000.png">
                <img src="./../snake/snake/tile001.png">
                <img src="./../snake/snake/tile002.png">
                <img src="./../snake/snake/tile003.png">
                <img src="./../snake/snake/tile004.png">
                <img src="./../snake/snake/tile005.png">
                <img src="./../snake/snake/tile007.png">
                <img src="./../snake/snake/tile008.png">
                <img src="./../snake/snake/tile009.png">
                <img src="./../snake/snake/tile012.png">
                <img src="./../snake/snake/tile013.png">
                <img src="./../snake/snake/tile014.png">
                <img src="./../snake/snake/tile018.png">
                <img src="./../snake/snake/tile019.png">
                </div>
        </div>
        <div class="wrapper-footer">
            <footer>
                <div id="footer" class="footer">
                    <div id="controls"></div>
                    <div class="progress_wrapper"><p>Time left</p><progress value="0" max="300" id="progressBar"></progress></div>
                    <div id="scores"></div>

                </div>
            </footer>
        </div>

</body>
<script src="./snekScript/snakecolor.js?v=1" defer type="module"></script>
</html>