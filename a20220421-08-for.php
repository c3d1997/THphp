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
        <tr>
            <?php for ($i = 0; $i < 16; $i++) : ?>
                <td style="background-color: #0000<?= sprintf("%X%X", $i, $i) ?>">
                    
                </td>
            <?php endfor; ?>
        </tr>
    </table>


</body>

</html>