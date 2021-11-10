<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="./../../common_style/fonts.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Info</title>
    <link rel="stylesheet" href="./style/userinfo_css.css">
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
        $res = $dbc->query("SELECT iduser, username, email FROM user WHERE iduser='{$userID}'");
        $row = $res->fetch_assoc();

        

        if (!isset($_COOKIE['userid'])) {
           echo "you can't acces this page without logging in."; 
        } else {
            ?>
            <form action="userscript.php" method="post">
                <h2>Profile</h2>
            <label for="UniqueID">Unique ID <br>
            <?php echo "<input class='form-control' type='text' value='".$row['iduser']."' disabled>";?>
            </label>
            
            <label for="Username">Username <br>
            <?php echo "<input class='form-control' type='text' name='username' value='".$row['username']."' disabled>";?>
            </label>
            
            <label for="Email">Email <br>
            <?php echo "<input id='email' class='form-control' type='email' name='email' value='".$row['email']."' disabled>"; ?> 
            </label>
            <div class="buttons">
            <button type="button" onclick="changeData()">Edit</button>
            
            <button type="submit">Save</button>
            </div>
            <a href="changePass.php">Change Password</a>
            
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