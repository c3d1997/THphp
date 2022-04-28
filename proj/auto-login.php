<?php
session_start();

$_SESSION['admin'] = [
    'id' => '777',
    'email' => 'shin@aaa.com',
    'nickname' => '皮卡丘',
];

header('Location: index_.php');