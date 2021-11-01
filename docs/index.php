<?php

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>snekgame</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/main.css">
        <script src="snekScript/game.js" defer type="module"></script>
        
    </head>
    
    <body>

        <div id="wrapper">
            <div class="header">
                <div class="inner_header">
                    <h3>Basic Snek</h3>
                    <a href="./../accountSystem/login/index.php">Login</a>
                </div>
            </div>
            <div class="wrapper2">
                <div id="game-board" class="game-board"></div>
            </div> 
            <div class="wrapper-footer">  
                <footer>
                    <a>Blue = W,A,S,D & Red = Up,Down,Left,Right </a>
                    <!-- <button onclick="">Multiplayer</button> -->
                    <div id="scores">
                        
                    </div>
                </footer>
            </div>
        </div>
        
    </body>
</html>
