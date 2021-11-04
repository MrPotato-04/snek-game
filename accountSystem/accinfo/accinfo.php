<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Info</title>
</head>
<body>
    <?php
        $userID = null;
        if (isset($_COOKIE['userid'])) {
            $userID = $_COOKIE["userid"];
        }

        $dbc = require './../../database/db.php';
        $res = $dbc->query("SELECT iduser, username, email, password FROM user WHERE iduser='{$userID}'");
        $row = $res->fetch_assoc();

        
        if (!isset($_COOKIE['userid'])) {
           echo "you can't acces this page without logging in."; 
        } else {
            ?>
            <label for="UniqueID">Unique ID <br>
            <?php echo "<input type='text' value='".$row['iduser']."' disabled>";?>
            </label>
            <br>
            <label for="Email">Email <br>
            <?php echo "<input type='text' value='".$row['email']."' disabled>";?>
            </label>
            <br>
            <label for="Email">Username <br>
            <?php echo "<input type='text' value='".$row['username']."'>"; ?>
            <br>
            <label for="Password">Password <br>
            <?php echo "<input type='password' value='".$row['password']."' disabled>";
            
        }

    ?>
    </label>
</body>
</html>