<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Snek on Crack</title>
    <link rel="icon" type="image/x-icon" href="favicon-32x32">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="/snek-game/node_modules/jquery/dist/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/snek-game/common_style/fonts.css?v=1">
    <link rel="stylesheet" href="styles/css/main.css?v=1">
    <link rel="stylesheet" href="styles/css/snake1.css?v=1">
    <link rel="stylesheet" href="styles/css/snake2.css?v=1">
    <link rel="stylesheet" href="./../common_style/menu.css?v=1">
    <script src="snekScript/game.js?v=1" defer type="module"></script>
    <link rel="stylesheet" href="/snek-game/common_style/header.css"
    
    </script>

</head>

<body>
    <div id="wrapper">

        <?php require_once("./../common_style/header.php") ?>
        
        <div class="wrapper2">
            <?php include_once('./../common_style/menu.php') ?>
            <div id="game-board" class="game-board"></div>
        </div>
        <div class="wrapper-footer">
            <footer>
                <div id="footer" class="footer">
                    <div id="controls"></div>
                    <div id="scores"></div>

                </div>
            </footer>
        </div>

</body>
<script src="./snekScript/snakecolor.js?v=1" defer type="module"></script>
</html>