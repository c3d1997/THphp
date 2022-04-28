<?php
session_start(); // 啟用 session 功能
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>

        <?php
        $_SESSION['user'] = 'shin';

        echo $_SESSION['user'];
        ?>



    </div>
</body>

</html>