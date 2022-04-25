<?php
session_start();

$users = [
    'ming' => [
        'nickname' => '小明',
        'password' => '1234',
    ],
    'shin' => [
        'nickname' => '小新',
        'password' => '5678',
    ],
];

if (!empty($_POST['user']) and !empty($_POST['password'])) {

    $user = empty($users[$_POST['user']]) ? '' : $users[$_POST['user']];
    if ($user == '') {
        echo '帳號錯誤';
        exit;
    } else {
        if ($_POST['password'] == $user['password']) {
            $_SESSION['user'] = [
                'account' => $_POST['user'],
                'nickname' => $user['nickname'],
            ];
        } else {
            echo '密碼錯誤';
            exit;
        }
    }
}

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
    <?php if (isset($_SESSION['user'])) : ?>
    <h2><?= $_SESSION['user']['nickname'] ?> </h2>
    <p><a href="a20220425-09-logout.php">登出</a></p>
    <?php else : ?>
    <form method="post">
        <input type="text" name="user" placeholder="用戶名稱">
        <br>
        <input type="password" name="password" placeholder="用戶密碼">
        <br>
        <input type="submit">
    </form>
    <?php endif ?>



</body>

</html>