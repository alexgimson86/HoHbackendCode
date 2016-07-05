<?php

    header('Access-Control-Allow-Origin : *');
    include 'connection.php';
    $idstores = $_GET['idstores'];
	
    $query = "SELECT * ".
             "FROM `hallofheroes_db`.`stores` ".
            "WHERE `idstores` = '$idstores';";
           
             
    
        $result = $conn->query($query);
	$result_array = array();
	
	while($row = mysqli_fetch_assoc($result))
	{
            $result_array[] = $row;
	}
	echo json_encode($result_array);
?>