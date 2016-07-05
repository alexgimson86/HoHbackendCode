<?php

    header('Access-Control-Allow-Origin : *');
    include 'connection.php';
    $resHall = $_GET['resHall'];
	
    $query = "SELECT `idUsers`,`firstName`,`lastName`, `avatarUrl` ".
             "FROM `hallofheroes_db`.`users` ".
            "WHERE `residenceHall` = '$resHall'".
            "ORDER BY `lastName` ASC;";
             
    
        $result = $conn->query($query);
	$result_array = array();
	
	while($row = mysqli_fetch_assoc($result))
	{
            $result_array[] = $row;
	}
	echo json_encode($result_array);
?>

	