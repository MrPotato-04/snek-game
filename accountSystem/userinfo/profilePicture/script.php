<!DOCTYPE html>
<html>

<head>
</head>

<body>
    <?php
    session_start();
    if(isset($_SESSION['errors'])) {
        unset($_SESSION['errors']);
    }

    $msg = "";

    $dbc = require './../../../database/db.php';

    $userID = null;
    if (isset($_COOKIE['userid'])) {
        $userID = $_COOKIE["userid"];
    }
    //variables
    $error = [0];
    $filename = $_FILES['picture']['name'];
    $tempname = $_FILES['picture']['tmp_name'];
    $folder = "./../../../image/" . $filename;


    $res = $dbc->query("SELECT * FROM `user` WHERE `iduser` = $userID");
    $row = $res->fetch_assoc();

    if (!isset($_FILES['picture'])) {
        $error = [1];
        $_SESSION['errors'] = "Please upload a file.";
        header("location: index.php");
    }

    //if no errors insert into database
    if ($error == [0]) {
        $query = "UPDATE `user` SET `/snek-game/image`='image/$filename' WHERE `iduser`=$userID";

        $q=mysqli_query($dbc, $query);
        if(!$q){echo mysqli_error($dbc);}
        else{echo"u shuld be gud". mysqli_error($dbc);}
        
        if (move_uploaded_file($tempname, "$folder")) {
            $msg = "Image uploaded successfully";
            //header("location: ./../userinfo.php");
        } else {
            $msg = "Failed to upload image";
        }
    }
    ?>

</body>

</html>