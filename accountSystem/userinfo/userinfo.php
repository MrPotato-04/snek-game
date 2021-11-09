<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Info</title>
</head>
<body>
    <script>
        function changeData() {
            document.getElementById("email").removeAttribute("disabled");
        }
    </script>
    <?php
        session_start();

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
            <form action="userscript.php" method="post">
            <label for="UniqueID">Unique ID <br>
            <?php echo "<input type='text' value='".$row['iduser']."' disabled>";?>
            </label>
            <br>
            <label for="Username">Username <br>
            <?php echo "<input id='username' type='text' name='username' value='".$row['username']."' disabled>";?>
            </label>
            <br>
            <label for="Email">Email <br>
            <?php echo "<input id='email' type='email' name='email' value='".$row['email']."' disabled>"; ?> <button type="button" onclick="changeData()">Edit</button>
            <br>
            <a href="changePass.php">Change Password</a>
            <br>
            <button type="submit">Save</button>
            
        <?php
        }
        ?>
    </label>
    </form>
    <?php
    if (isset($_SESSION['errors'])) {
        $error_output = $_SESSION['errors'];
        echo $error_output;
        unset($_SESSION['errors']);
    }
    ?>
</body>
</html>