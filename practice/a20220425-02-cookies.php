<?php


setcookie('mycookie', 'abc', time() + 20);


echo $_COOKIE['mycookie'];