<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>leaderboard</title>
</head>
<body>
    <?php
    require_once('leadscript.php');
    ?>
    <div>
        <table>
            <tr>
                <th>Player</th>
                <th>Highscore</th>
            </tr>
            <?php
                while($row = $res->fetch_assoc()) {

                    echo"<tr>><td>".$row['username']."</td></tr>";
                    echo"<tr>><td>".$row['scores']."</td></tr>";

                }
            ?>
        </table>
    </div>
</body>
</html>