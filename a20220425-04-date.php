<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <?php
        // date_default_timezone_set('Asia/Taipei');

        echo date('Y-m-d H:i:s') . '<br>';
        echo time() . '<br>';
        echo strtotime('2022-04-25') . '<br>';
        echo date('Y-m-d H:i:s l', time() + 30 * 24 * 60 * 60) . '<br>';  //三十天之後 




        ?>





    </div>
</body>

</html>