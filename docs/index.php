
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>snekgame</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/main.css">
        <link rel="stylesheet" href="styles/snake1.css">
        <script src="snekScript/game.js" defer type="module"></script>
        
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
                        if ($userID !== null) {
                            echo "<form action=\"index.php\" method=\"post\"><input type=\"submit\" name=\"logout\" value=\"Logout\"></form>";
                            echo "<form action=\"gamemode.php\" method=\"post\"><input type=\"submit\" name=\"logout\" value=\"Gamemodes\"></form>";
                            echo "<form action=\"leaderboards/leadpage.php\" method=\"post\"><input type=\"submit\" name=\"logout\" value=\"Leaderboard\"></form>";
                            if (isset($_COOKIE['demoExpire'])) {
                                if(isset($_COOKIE['userid'])) {
                                    unset($_COOKIE['demoExpire']);
                                } else {
                                    header("Location: ./../accountSystem/login/index.php");
                                }
                            }
                        }
                        if ($userID === null) {
                            echo "<a class=\"a\"href=\"./../accountSystem/login/index.php\">Login</a>"; 
                            echo "<div class=\"progress_wrapper\"><a class=\"progress\">Time Left</a><progress value=\"0\" max=\"300\" id=\"progressBar\"></progress></div>";
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
                            echo "<a>Logged in as: ". $row['username'] .", Highscore = ".$score."</a>";
                        }
                        if(isset($_POST["logout"])) {
                            unset($_COOKIE['userid']);
                            setcookie('userid', null, -1, "/");
                            header("Location: index.php");
                            
                        }
                            

                    ?>               
                </div>
            </div>
            <div class="wrapper2">
                <div id="game-board" class="game-board"></div>
            </div> 
            <div class="wrapper-footer">  
                <footer>
                    <div id="footer">
                        <div id="controls">Blue = W,A,S,D & Red = Up,Down,Left,Right </div>
                        
                        <div id="scores">
                            
                        </div>
                    </div>
                    <!-- <button onclick="">Multiplayer</button> -->
                </footer>
            </div>

    </body>
</html>