<?php
    session_start();

    //connect to database
    $DB_DATABASE = "snekdatabase";
    $DB_HOST = "localhost";
    $DB_USERNAME = "root";
    $DB_PASSWORD = "";

    $dbc = new mysqli($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_DATABASE);
    $res = $dbc->query("SELECT * FROM user WHERE email='{$_POST['email']}' AND password='{$_POST['password']}' ORDER BY email");
    $row = $res->fetch_assoc();

    //connection error
    if (mysqli_connect_errno()) {
        printf("Connection failed: ", mysqli_connect_errno());
        exit();
    }

    //variables
    $email = $_POST['email'];
    $password = $_POST['password'];

    //form validation errors
    if(!$row['email'] || !$row['password']) {
        $_SESSION['errors'] = 'Email or password is invalid';
        header("location: ../login");
        exit();
    }

    //data validation
    $_SESSION["userid"] = $row['id'];
    $_SESSION["email"] = $row['email'];
    setcookie("userid", $row['id'], time() + 86400, "/");
    header("location: ./../../docs/index.html");

?>