<?php
    session_start();

    //connect to database
    $DB_DATABASE = "snekdatabase";
    $DB_HOST = "localhost";
    $DB_USERNAME = "root";
    $DB_PASSWORD = "";

    $dbc = new mysqli($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_DATABASE);
    $res = $dbc->query("SELECT * FROM user WHERE username='{$_POST['username']}' AND password='{$_POST['password']}' ORDER BY username");
    $row = $res->fetch_assoc();

    if (mysqli_connect_errno()) {
        printf("Connection failed: ", mysqli_connect_errno());
        exit();
    }

    if($row) {
        $_SESSION["userid"] = $row['id'];
        $_SESSION["username"] = $row['username'];
        header("location: ./../docs/index.html");
    } else {
        echo "shit don't work";
    }
?>