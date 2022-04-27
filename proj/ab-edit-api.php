<?php
require './parts/connect-db.php';

$output = [
    'success' => false,
    'error' => '',
    'code' => 0,
    'postData' => $_POST,  // 確認資料
];
header('Content-Type: application/json');

$sid = isset($_POST['sid']) ? intval($_POST['sid']) : 0;

$row = $pdo->query("SELECT * FROM address_book WHERE sid=$sid")->fetch();
if (empty($row)) {
    $output['error'] = '沒有該筆資料';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

$sql = "UPDATE `address_book` SET `name`=?,`email`=?,`mobile`=?,`birthday`=?,`address`=? WHERE sid=$sid";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    $_POST['name'],
    $_POST['email'],
    $_POST['mobile'],
    empty($_POST['birthday']) ? null : $_POST['birthday'],
    $_POST['address'],
]);

$output['rowCount'] = $stmt->rowCount();
if ($stmt->rowCount() == 1) {
    $output['success'] = true;
} else {
    $output['error'] = '資料沒有更新';
}

echo json_encode($output);