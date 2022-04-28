<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="./a20220422-09-post.php" method="post">
        <input type="text" name="account" placeholder="帳號">
        <br>
        <input type="password" name="password" placeholder="密碼">
        <br>

        <input type="checkbox" name="fav[]" id="fav1" value="游泳">
            <label for="fav1">游泳</label><br>
        <input type="checkbox" name="fav[]" id="fav2" value="爬山">
            <label for="fav2">爬山</label><br>
        <input type="checkbox" name="fav[]" id="fav3" value="跑步">
            <label for="fav3">跑步</label><br>

        <button type="submit">送出</button>

    </form>
</body>

</html>