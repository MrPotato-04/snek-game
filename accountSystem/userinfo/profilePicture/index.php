<!DOCTYPE html>
<html lang="en">

<head>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/"></script>
    <link rel="stylesheet" type="text/css" href="/common_style/fonts.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Profile Picture</title>
    <link rel="stylesheet" href="./../style/userinfo.css">

</head>

<body>
    <?php
    session_start();

    $userID = null;
    if (isset($_COOKIE['userid'])) {
        $userID = $_COOKIE["userid"];
    }
    ?>

    <form action="script.php" method="post" enctype="multipart/form-data">
    <label for="blah"><h2>Your img</h2></label>
        <img id="blah" src="" alt="" />
        
        <input type="file" name="picture" id="imgInp" accept="image/*" required>
        <br>
        <button type="submit">Change profile picture</button>
        <button id="cancel" onclick="window.location='/index.php'">Cancel</button>
    </form>
    <script>
        const imgInp = document.getElementById('imgInp');
        const blah = document.getElementById('blah');
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }
        }
    </script>
</body>
</html>