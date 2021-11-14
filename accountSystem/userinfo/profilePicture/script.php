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


    $res = $dbc->query("SELECT * FROM `profile-images` WHERE `user_iduser` = $userID");
    $row = $res->fetch_assoc();

    if (!isset($_FILES['picture'])) {
        $error = [1];
        $_SESSION['errors'] = "Please upload a file.";
        header("location: index.php");
    }

    //if no errors insert into database
    if ($error == [0]) {
        if ($row['image'] === null) {
            $query = "INSERT INTO `profile-images` (`user_iduser`, `image`) VALUES ($userID, '$idname')";
        } else {
            $query = "UPDATE `profile-images` SET `image`='image/$filename' WHERE `user_iduser`=$userID";
        }

        mysqli_query($dbc, $query);
        if (move_uploaded_file($tempname, "$folder")) {
            $msg = "Image uploaded successfully";
            header("location: ./../userinfo.php");
        } else {
            $msg = "Failed to upload image";
        }
    }
    ?>

</body>

</html>