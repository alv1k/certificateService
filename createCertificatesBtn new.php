<?php 

    $name = $_GET['name']; 

    $con = new mysqli('localhost', '473574', 'psycho03', '473574');
    if (mysqli_connect_errno()) {
        echo "Подключение невозможно: ".mysqli_connect_error();
    }

    $select = "SELECT * FROM table_name";  

    $conn_id = ftp_connect("certificateservice.orgfree.com", 21, 10);
    $login_result = ftp_login($conn_id, "certificateservice.orgfree.com", "psycho03");
    if (!$login_result) exit("Не могу соединиться");
    

    if($result = mysqli_query($con, $select)){
     
        $rowsCount = mysqli_num_rows($result); // количество полученных строк
        echo "<p>Получено объектов: $rowsCount</p>";
        echo "<table><tr><th>Id</th><th>Имя</th><th>Возраст</th></tr>";
        foreach($result as $row){
            echo "<tr>";
                echo '<div style="height: 600px; background-image: url(uploads/1.webp); background-size: 100% 100%;">
                <p style="font-size: 50px; position: absolute; top: 200px; left: 600px;">' . $row["Column_1"] . '</p>
                </div>';
                echo "<td>" . $row["Column_2"] . "</td>";
                echo "<td>" . $row["Column_3"] . "</td>";
            echo "</tr>";
        }
        $upload = ftp_put($conn_id, 'public_html/'.$paths.'/'.$name, $filep, FTP_BINARY);
        echo "</table>";
        mysqli_free_result($result);

    } else{
        echo "Ошибка: " . mysqli_error($con);
    }
?>