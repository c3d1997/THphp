<?php
require './parts/connect-db.php';

$sql = "SELECT * FROM `categories` ORDER BY sequence";

$rows = $pdo->query($sql)->fetchAll();
//echo json_encode($rows);

$dict = [];
foreach ($rows as $r) {
    $dict[$r['sid']] = $r;
}

// echo json_encode($dict);

foreach ($dict as &$r2) {
    //$dict[$r['sid']] = $r;
    if ($r2['parent_sid'] != '0') {
        $parent = &$dict[$r2['parent_sid']];

        $parent['children'][] = &$r2;
    }
}

$result = [];
foreach ($dict as &$r3) {

    if ($r3['parent_sid'] == '0') {
        $result[] = &$r3;
    }
}


echo json_encode($result);