<!DOCTYPE html>
<html lang="en">

<head>

    <script src="./../../node_modules/jquery/dist/jquery.min.js?v=1"></script>
    <link rel="stylesheet" href="leadstyle.css">
    <link rel="stylesheet" href="/snek-game/common_style/header.css">
    <link rel="stylesheet" href="/snek-game/common_style/menu.css">
    <script src="./../snekScript/burger.js?v=1" defer type="module"></script>
    <link rel="icon" type="image/x-icon" href="/snek-game/docs//sneklogo.png">
    <title>Leaderboard</title>
</head>

<body>

    <?php
    $dbc = require './../../database/db.php';
    $res_leaderbord = $dbc->query("SELECT * FROM `scores`, `user` WHERE iduser = scores.user_iduser GROUP BY user_iduser ORDER BY scores DESC LIMIT 10");
    //require_once('leadData.php');
    require_once('./../../common_style/header.php');
    require_once('./../../common_style/menu.php');
    ?>

    <div>
        <?php

        $ranking = 1;
        echo "<table>"; // start a table tag in the HTML
        echo "<tr><th>Ranking</th>
        <th>User</th>
        <th>High Score</th>
        </tr>
        <tr>";
        while ($row_leaderbord = mysqli_fetch_array($res_leaderbord)) {
            echo " 
        <td>{$ranking}</td>
        <td>{$row_leaderbord['username']}#{$row_leaderbord['iduser']}</td>
        <td>{$row_leaderbord['scores']}</td>
        </tr>
";
            $ranking++;
        }

        echo "</table>"
        ?>
    </div>
</body>

</html>