<?php
session_start();

unset($_SESSION['user']);

header('Location: a20220425-08-login.php');