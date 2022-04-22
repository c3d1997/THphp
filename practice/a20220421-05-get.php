<?php

$a = isset($_GET['a']) ? intval($_GET['a']) : 0;

$b = empty($_GET['b']) ? 0 : intval($_GET['b']);

$c = $_GET['c'] ?? 0;


echo $a + $b + $c ;

# isset(): 判斷變數有沒有設定過, 結果是 
# intval(): 把值轉換為整數
# empty(): 判斷值是不是空的, false, 0, '', 空陣列, 沒設定過的變數
