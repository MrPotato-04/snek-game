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
    $pfpicture = "#";
} else {
    // session_start();
    $dbc = require "./../database/db.php";
    $res_image = $dbc->query("SELECT * FROM  `profile-images` WHERE `user_iduser` = $userID");
    $image_result = $res_image->fetch_assoc();
    $pfpicture = $image_result['image'];
    if ($pfpicture === null) {
        $pfpicture = "#";
    };
    $res = $dbc->query("SELECT * FROM  `user` WHERE `iduser` = $userID");
    $row = $res->fetch_assoc();
    $username = $row['username'];

    $res_scores = $dbc->query("SELECT * FROM  `scores` WHERE `user_iduser` = $userID");
    $row_scores = $res_scores->fetch_assoc();
    $highscore = $row_scores['scores'];
};
?>
<div class="content">
    <div class="flex">
        <nav>
            <ul id="links" class="navigation">
                <?php if ($userID !== null && $pfpicture !== null) {
                    echo "<li><a href=\"/snek-game/accountSystem/userinfo/userinfo.php\"><img src=\"./../$pfpicture\" alt=\"Avatar\" class=\"avatar\"><h1>Welcome $username</h1></a></li><li><a>Your highscore is $highscore</a></li>";
                }; ?>
                <li><a href="/index.php">Home</a></li>
                <li><a href="leaderboards/leadpage.php">Leaderboard</a></li>
                <?php
                if ($userID !== null) {
                    echo "<li><form action=\"gamemode.php\" method=\"post\" id=\"logout\"><input type=\"hidden\" name=\"logout\" value=\"Gamemodes\"><a href=\"javascript:{}\" onclick=\"document.getElementById('logout').submit(); return false;\">Logout</a></form></li>";
                } else {
                    echo "<li><a href=\"/snek-game/accountSystem/login/index.php\">Login</a></li>";
                }
                ?>
                <!-- <li><a href="#0">placeholde</a></li>
                            <li><a href="./../contact.php">Our Team</a></li> -->
            </ul>
        </nav>
    </div>
</div>