<pre>
<?php

$ar1 = array(3, 5, 2, 8);

$ar2 = [3, 5, 2, 8];

print_r($ar2);

var_dump($ar2);

$ar3 = array(
    'name' => 'David',
    'age' => 28,
);

$ar4 = [
    'name' => 'David',
    'age' => 28,
];
print_r($ar4);

// 儘量不要混用
$ar5 = [
    20,
    'name' => 'David',
    'age' => 28,
    'mary'
];
print_r($ar5);

?>
</pre>

