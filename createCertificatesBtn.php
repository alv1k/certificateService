<?php 

    $name = $_GET['name']; 

    $con = new mysqli('localhost', '473574', 'psycho03', '473574');
    if (mysqli_connect_errno()) {
        echo "Подключение невозможно: ".mysqli_connect_error();
    }

    $select = "SELECT * FROM table_name";  
    //$result = mysqli_query($con, $select);

    if($result = mysqli_query($con, $select)){
     
        $rowsCount = mysqli_num_rows($result); // количество полученных строк
        echo "<p>Получено объектов: $rowsCount</p>";
        echo "<table><tr><th>Id</th><th>Имя</th><th>Возраст</th></tr>";
        foreach($result as $row){
            echo "<tr>";
                echo "<td>" . $row["Column_1"] . "</td>";
                echo "<td>" . $row["Column_2"] . "</td>";
                echo "<td>" . $row["Column_3"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        mysqli_free_result($result);
    } else{
        echo "Ошибка: " . mysqli_error($con);
    }
    // if (mysqli_num_rows($result) > 0) {
    //     // output data of each row
    //     while($row = mysqli_fetch_assoc($result)) {
    //         $surname[] = $row["Column_1"];                  
    //         //$name[] = $row["Column_3"];                 
    //         //$ruk[] = $row["Column_4"];
    //     }
    // } else {
    //     echo "0 results";
    // }
    for($i=0;$i<40;$i++){


?>
        <div style="height: 600px; background-image: url(1.webp); background-size: 100% 100%;">
            <p style="font-size: 50px; position: absolute; top: 200px; left: 600px;"> <?php echo $surname[$i] ?>  <?php echo $name[$i] ?></p>
            <p style="font-size: 40px; position: absolute; top: 400px; left: 800px;">Руководитель: <span><?php echo $ruk[$i] ?></span>  </p>
        </div>
    <?php
            // Получает содержимое текущего буфера и удаляет его
            $conn_id = ftp_connect("certificateservice.orgfree.com", 21, 10);
            $login_result = ftp_login($conn_id, "certificateservice.orgfree.com", "psycho03");
            if (!$login_result) exit("Не могу соединиться");
            $html = ob_get_clean();
            //создает файл
            $myfile = fopen('certificats/newFile.html', 'w+') or die("Unable to open file!");
            // Запишет данные в файл
            file_put_contents('certificats/'.$surname[$i].'.html', $html);
            // Если еще надо вернуть эту страницу в браузер
            echo "Готово. сертификаты в папке certificats/<br /> \n";
            $dropIt = "DELETE FROM table_name WHERE Column_1='".$surname[$i]."'";
            $resultDrop = mysqli_query($con, $dropIt);
            echo "Database dropped!"; 
    }  

    ?>
    <div class="col-8 mx-auto">
        <a href="index.html">Вернуться к загрузке таблицы</a>
         
    </div> 