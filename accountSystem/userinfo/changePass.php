<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if (isset($_SESSION['errors'])) {
            $error_output = $_SESSION['errors'];
            echo $error_output;
            unset($_SESSION['errors']);
        }
    ?>
    <form action="passScript.php">
        <input type="password" name="password" placeholder="New Password">
        <br>
        <input type="password" name="repass" placeholder="Confirm Password">
        <br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>