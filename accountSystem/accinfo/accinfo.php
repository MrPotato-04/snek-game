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
        session_start();

        require_once('accedit.php');

        if (isset($_SESSION['errors'])) {
            $error_output = $_SESSION['errors'];
            echo $error_output;
            unset($_SESSION['errors']);
        }

        if (!isset($_COOKIE['userid'])) {
           echo "you can't acces this page without logging in."; 
        } else {
            ?>
            <form action="accedit.php" method="post">
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
            <?php echo "<input type='password' value='".$row['password']."' disabled>";?>
            <button type="submit" name="edit" value="edit">Edit</button>
            
        <?php
        }
        ?>
    </label>
    </form>
</body>
</html>