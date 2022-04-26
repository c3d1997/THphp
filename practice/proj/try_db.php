<?php

require './parts/connect-db.php';

$sql = "SELECT * FROM address_book LIMIT 5";
$stmt = $pdo->query($sql);

$row = $stmt->fetchAll();

//print_r($row);
header('Content-Type: application/json');  // 伺服器告訴用戶端文件的格式為 JSON
echo json_encode($row, JSON_UNESCAPED_UNICODE);