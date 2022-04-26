<?php
require './parts/connect-db.php';

$output = [
    'success' => false,
    'error' => '',
    'code' => 0,
    'postData' => $_POST,  // 確認資料
];
header('Content-Type: application/json');


// TODO: 檢查欄位資料
if (empty($_POST['name'])) {
    $output['error'] = '沒有姓名資料';
    echo json_encode($output, JSON_UNESCAPED_UNICODE);
    exit;
}

$sql = "INSERT INTO `address_book`( `name`, `email`, `mobile`, `birthday`, `address`, `created_at`) VALUES ( ?, ?, ?, ?, ?, NOW())";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    $_POST['name'],
    $_POST['email'],
    $_POST['mobile'],
    $_POST['birthday'],
    $_POST['address'],
]);

$output['rowCount'] = $stmt->rowCount();
if ($stmt->rowCount() == 1) {
    $output['success'] = true;
} else {
    $output['error'] = '新增失敗';
}


echo json_encode($output);