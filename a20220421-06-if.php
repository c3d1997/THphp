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
    $age = isset($_GET['age']) ? intval($_GET['age']) : 0;

    if ($age < 18) {
    ?>
        <h2>長大後再來</h2>
        <img src="../imgs/file-20220131-15-1ndq1m6.avif" alt="" width="200px">
    <?php
    } else {
    ?>
        <h2>歡迎光臨</h2>
        <img src="../imgs/egypt_kitty_social.webp" alt="" width="200px">
    <?php
    }
    ?>
</body>

</html>