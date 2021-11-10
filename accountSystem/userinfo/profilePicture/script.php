<!DOCTYPE html>
<html>

<head>
</head>

<body>
    <?php
    session_start();
    $msg = "";

    $dbc = require './../../../database/db.php';

    $userID = null;
    if (isset($_COOKIE['userid'])) {
        $userID = $_COOKIE["userid"];
    }
    $idname = "image/userid_".$userID.".png";
    //variables
    echo "<pre>";
    print_r($_FILES['picture']);
    echo "</pre>";
    $filename = $_FILES['picture']['name'];
    $tempname = $_FILES['picture']['tmp_name'];
    $folder = "image/" . $filename;


    $res = $dbc->query("SELECT * FROM `profile-images` WHERE `user_iduser` = $userID");
    $row = $res->fetch_assoc();
    //if no errors insert into database
    if ($row['user_iduser'] !== $userID) {
        $query = "INSERT INTO `profile-images` (`user_iduser`, `image`) VALUES ($userID, '".$folder."$idname')";
    } else {
        $query = "UPDATE `profile-images` SET `image`='$idname' WHERE `user_iduser`=$userID";
    }
    
    mysqli_query($dbc, $query);
    if (move_uploaded_file($tempname, $folder)) {
        $msg = "Image uploaded successfully";
        rename($folder, $idname);
    } else {
        $msg = "Failed to upload image";
    }

    ?>

</body>

</html>