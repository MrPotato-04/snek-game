<!DOCTYPE html>
<html>
<?php
require_once "envRead.php";
use envRead\DotEnv;

(new DotEnv(__DIR__ . '/.env'))->load();

?>

<body>
    <form action="1r14t452y36u45jh2g413f.php" method="post" id="password">
        <input type="password" name="password">
        <input type="submit">
    </form>
    <?php
    if (isset($_POST['password'])) {
        if (("\"".$_POST["password"]."\"") === getenv('PASSWORD')) {
            exec("git pull origin main");
            echo "nonononononoo";
            unset($_POST['password']);
            // header("location: index.php");
        } else {
            echo "wrong password";
        }
    }
    ?>
</body>

</html>