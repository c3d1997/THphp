<?php
session_start(); // 啟用 session 功能

if (isset($_SESSION['count'])) {
    $_SESSION['count']++;
} else {
    $_SESSION['count'] = 1;
}

echo $_SESSION['count'];