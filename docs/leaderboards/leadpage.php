<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="leadstyle.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>leaderboard</title>
</head>
<body>
    <?php
    require_once('leadData.php');
    ?>
    <div>
    <?php
    echo "________________________________";
    echo "<table>"; // start a table tag in the HTML

    while($row = mysqli_fetch_array($res)){   //Creates a loop to loop through results
    echo "<tr><td>" . $row['username'] . "</td><td>" . $row['scores'] . "</td></tr>";  //$row['index'] the index here is a field name
    }
    
    echo "</table>"
    ?>
    </div>
    
</body>
</html>