<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>
<?php
    $i = 5;
    $k = 7;
    printf('<h2> %s * %s = %s</h2>', $i, $k, $i*$k);

    echo sprintf('<h2> %s * %s = %s</h2>', $i, $k, $i*$k);

    printf("<h2> %'06d </h2>", $i*$k);

    printf("<h2> %f </h2>", 0.1);

    printf("<h2> %.2f </h2>", 0.1);

?>


<script>
// ... rest operator 其餘運算子
function f(a, ...v) {
    console.log(a);
    console.log(v);
}

f(2,4,6,8);

</script>

</body>

</html>