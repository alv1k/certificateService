<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>

    <?php
        $uploaddir = 'uploads/';
        $uploadfile = $uploaddir . basename($_FILES['tableName']['name']);

        echo '<pre>';
        if (move_uploaded_file($_FILES['tableName']['tmp_name'], $uploadfile)) {
            echo "Файл корректен и был успешно загружен.\n";
        } else {
            echo "Возможная атака с помощью файловой загрузки!\n";
        }

        // echo 'Некоторая отладочная информация:';
        // print_r($_FILES);

        print "</pre>";

    ?>
    <div class="col-8 mx-auto">
        <p class="fs-3 ms-5">Список всех файлов таблиц</p>
        
    </div>
        <div class="col-8 mx-auto bg-warning fs-5">
            <div class="col-12 d-flex " >
                <p>Имя файла:</p>
                <p>Дата изменения </p>
            </div>

    <?php


        $con = new mysqli('localhost', 'root', '', 'googleFORManswers');
        if (mysqli_connect_errno()) {
            echo "Подключение невозможно: ".mysqli_connect_error();
        }
        

        $url = 'uploads';
        $dir = 'uploads/*.sql'; // убедитесь, что директория указана правильно

        foreach (glob($dir) as $fileName) {

        ?> 


        
            <div class="col-12 d-flex border">
                 <a class="col-6" style="text-decoration: none;" href="tableHasChoosen.php?marked=<?php echo "uploads/".basename($fileName) ?>">
                    <p><?php echo $url . '/' . basename($fileName), "\n"; ?></p>
                </a>
                <a class="col" style="text-decoration: none;" href="tableHasChoosen.php?marked=<?php echo "uploads/".basename($fileName) ?>">
                    <p><?php echo date("F d Y H:i:s.", filemtime($filename)); ?></p>
                </a>
            </div>
           
        
        <?php 

        }
         ?>
        </div>
         <div class="col-8 mx-auto">
            <a href="index.html">Вернуться к загрузке таблицы</a>
             
         </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>