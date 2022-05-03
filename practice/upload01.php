<?php


// 移動上傳的檔案
move_uploaded_file($_FILES['myfile']['tmp_name'], __DIR__ . '/' . $_FILES['myfile']['name']);
echo json_encode($_FILES['myfile']);