<pre>
<?php

// 儘量不要混用
$ar5 = [
    20,
    'name' => 'David',
    'age' => 28,
    'mary'
];

foreach($ar5 as $k => $v){
    echo "$k : $v \n";
}

echo json_encode($ar5); // 轉換為 json 字串
// json_decode: 從 json 字串轉那為原生的陣列或物件
echo '<br>';
echo json_encode([1,2,3]);
?>
</pre>

