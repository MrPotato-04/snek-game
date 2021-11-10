<?php
        session_start();

        $userID = null;
        if (isset($_COOKIE['userid'])) {
            $userID = $_COOKIE["userid"];
        }
    ?>

<form action="script.php" method="post" enctype="multipart/form-data">
        <input type="file" name="picture">
        <br>
        <button type="submit">Change profile picture</button>
    </form>