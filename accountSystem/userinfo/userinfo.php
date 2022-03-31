<head>

    <link rel="stylesheet" type="text/css" href="/common_style/fonts.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="./style/userinfo.css">
    <link rel="stylesheet" href="/common_style/header.css">
    <link rel="stylesheet" href="/common_style/menu.css">
    <script src="/docs/snekScript/burger.js" defer type="module"></script>
</head>

<body>
    <div id="wrapper">
        <script>
            function changeData() {
                document.getElementById("email").removeAttribute("disabled");
            }
        </script>
        <?php
        session_start();
        $userID = $_COOKIE['userid'];

        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        $conn = require './../../database/db.php';

        $res = $conn->query("SELECT `iduser`, `username`, `email` FROM `user` WHERE `iduser` = '$userID' ");
        $row = $res->fetch_assoc();

        include_once './../../common_style/header.php';
        include_once './../../common_style/menu.php';
        ?>
        <form action="userscript.php" method="post">
            <h2>Profile</h2>
            <br>
            <label for="UniqueID">Unique ID <br>
                <?php echo "<input class='form-control' type='text' value='" . $row['iduser'] . "' disabled>"; ?>
            </label>

            <label for="Username">Username <br>
                <?php echo "<input class='form-control' type='text' name='username' value='" . $row['username'] . "' disabled>"; ?>
            </label>

            <label for="Email">Email <br>
                <?php echo "<input id='email' class='form-control' type='email' name='email' value='" . $row['email'] . "' disabled>"; ?>
            </label>
            <div class="buttons">
                <button type="button" onclick="changeData()">Edit</button>

                <button type="submit">Save</button>

                <button type="button" class='small' onclick="window.location='changePass.php'">Change password</button>

            </div>

        </form>
    </div>
</body>

</html>