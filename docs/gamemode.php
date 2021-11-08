<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>snekgame</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/redirect.css">
        <script src="snekScript/gamemode.js" defer type="module"></script>
        
    </head>
    <body>

        <div id="wrapper">
            <div class="header">
                <div class="inner_header">
                    <h3>Basic Snek</h3>
                    <?php
                    $userID = null;
                    if (isset($_COOKIE['userid'])) {
                        $userID = $_COOKIE["userid"];
                    }
                    
                    if ($userID === null) {
                        echo "<a class=\"a\" href=\"./../accountSystem/login/index.php\">Login</a>"; 
                    } else {
                        // session_start();
                        $dbc = require "./../database/db.php";
                        $res = $dbc->query("SELECT * FROM user WHERE iduser = $userID");
                        $row = $res->fetch_assoc();
                        $res_scores = $dbc->query("SELECT * FROM scores WHERE user_iduser = $userID");
                        $row_scores = $res_scores->fetch_assoc();
                        $score = $row_scores['scores'];
                        if ($score === null) {
                            $score = 0;
                        } else {
                            $score = $row_scores['scores'];
                        };
                        echo "<a class=\"a\" id=\"loggedin\">Logged in as: ". $row['username'] .", Highscore = ".$score."</a>";
                        echo "<form action=\"index.php\" method=\"post\"><input type=\"submit\" name=\"logout\" value=\"Logout\"></form>";
                        echo "<form action=\"gamemode.php\" method=\"post\"><input type=\"submit\" name=\"logout\" value=\"Gamemodes\"></form>";
                        echo "<form action=\"leaderboards/leadpage.php\" method=\"post\"><input type=\"submit\" name=\"logout\" value=\"Leaderboard\"></form>";
                    }
                    ?>    
                </div>
            </div>
            <div class="content">

                <div class="buttons-mid">
                    <button id="button-multiplayer">Multiplayer</button>
                </div>

                <div class="buttons-mid">
                    <button id="button-singleplayer">Singleplayer</button>
                </div>    

            </div>
            <div class="wrapper-footer">  
                <footer>
                </footer>
            </div>
        </div>
        
    </body>
</html>
