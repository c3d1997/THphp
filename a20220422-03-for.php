<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        td {
            width: 5px;
            height: 5px;
        }
    </style>
</head>

<body>
    <table>
    <?php for ($r = 0; $r < 256; $r+=3) : ?>
        <tr>
            <?php for ($g = 0; $g < 256; $g+=3) : ?>
                <td style="background-color: <?= sprintf("#%'02X%'02X00", $r, $g) ?>">
                    
                </td>
            <?php endfor; ?>
        </tr>
    <?php endfor; ?>
    </table>


</body>

</html>