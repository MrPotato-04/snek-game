<?php
if (isset($_POST["logout"])) {
    unset($_COOKIE['userid']);
    setcookie('userid', null, -1, "/");
    header("Location: index.php");
}

// session_start();
if (!isset($conn)) {
    $conn = require "./../database/db.php";
}
if (!isset($userID)) {
    $userID = $_COOKIE['userid'];
}

$res = $conn->query("SELECT * FROM  `user` WHERE `iduser` = '$userID'");
$row = $res->fetch_assoc();
$username = $row['username'];

$res_scores = $conn->query("SELECT * FROM  `scores` WHERE `user_iduser` = '$userID'");
$row_scores = $res_scores->fetch_assoc();
$highscore = $row_scores['scores'];

?>
<div class="content">
    <div class="flex">
        <nav>
            <ul id="links" class="navigation">
                <?php if ($userID !== null) {
                    echo "<li><a href=\"/accountSystem/userinfo/userinfo.php\"><h1>Welcome $username</h1></a></li><li><a>Your highscore is $highscore</a></li>";
                }; ?>
                <li><a href="/index.php">Home</a></li>
                <li><a href="leaderboards/leadpage.php">Leaderboard</a></li>
                <?php
                if ($userID !== null) {
                    echo "<li><form action=\"gamemode.php\" method=\"post\" id=\"logout\"><input type=\"hidden\" name=\"logout\" value=\"Gamemodes\"><a href=\"javascript:{}\" onclick=\"document.getElementById('logout').submit(); return false;\">Logout</a></form></li>";
                } else {
                    echo "<li><a href=\"/accountSystem/login/index.php\">Login</a></li>";
                }
                ?>
            </ul>
        </nav>
    </div>
</div>