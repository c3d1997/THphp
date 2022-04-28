<?php
require './parts/connect-db.php';
//echo $_SERVER['HTTP_REFERER'];
//exit;

$output = [
    'success' => false,
    'error' => '',
    'code' => 0,
];

$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$password = isset($_POST['password']) ? trim($_POST['password']) : '';

if (empty($email)) {
    $output['error'] = '帳密錯誤'; //'沒有 Email';
    $output['code'] = 410;
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}
if (empty($password)) {
    $output['error'] = '帳密錯誤'; //'沒有給密碼';
    $output['code'] = 420;
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

$sql = "SELECT `id`, `email`,  `password`, `nickname` FROM members WHERE `email`=?";


$stmt = $pdo->prepare($sql);
$stmt->execute([$email]);

$row = $stmt->fetch();


if (!empty($row) and password_verify($password, $row['password'])) {
    $output['success'] = true;
    $output['code'] = 200;
    $_SESSION['admin'] = [
        'id' => $row['id'],
        'email' => $row['email'],
        'nickname' => $row['nickname'],
    ];
} else {
    $output['error'] = '帳密錯誤';
    $output['code'] = 430;
    $output['row'] = $row;
}

echo json_encode($output, JSON_UNESCAPED_UNICODE);