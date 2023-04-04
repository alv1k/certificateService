<?php 

    $con = new mysqli('localhost', 'root', '', 'googleFORManswers');
    if (mysqli_connect_errno()) {
        echo "Подключение невозможно: ".mysqli_connect_error();
    }
    echo $_GET['marked'] . "<br /> \n";
    $dir = $_GET['marked'];
    $homepage = file($dir);
    foreach($homepage as $line_num => $line){
    	$step = htmlspecialchars($line);
    	$result = mysqli_query($con, $step);
    	echo "Успешно " . $step. "<br /> \n";
    }



 ?>