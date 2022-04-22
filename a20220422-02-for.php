<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        td {
            width: 40px;
            height: 40px;
        }
    </style>
</head>

<body>
    <table>
    <?php for ($k = 0; $k < 16; $k++) : ?>
        <tr>
            <?php for ($i = 0; $i < 16; $i++) : ?>
                <td style="background-color: <?= sprintf("#%X%X%X%X00", $k, $k, $i, $i) ?>">
                    
                </td>
            <?php endfor; ?>
        </tr>
    <?php endfor; ?>
    </table>


</body>

</html>