<?php

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['admin'])) {
    include './ab-list-admin.php';
} else {
    include './ab-list-noadmin.php';
}