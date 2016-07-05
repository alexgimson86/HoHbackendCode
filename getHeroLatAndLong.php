<?php

    header('Access-Control-Allow-Origin : *');
    include 'connection.php';
    $userId = $_SESSION['userId'];
    
    $query = "SELECT * ".
             "FROM `hallofheroes_db`.`calls` ".
             "WHERE `callerUserId` = $userId ".
			 "ORDER BY `idcalls` DESC;";
    
    $result = $conn->query($query);
    $result_array = mysqli_fetch_assoc($result);
	$heroId = $result_array['receiverUserId'];
	
	$queryTwo = "SELECT `latitude`,`longitude`,`firstName`,`lastName` ".
             "FROM `hallofheroes_db`.`users` ".
			 "WHERE `idUsers` = $heroId;";
	 
	$result_two = $conn->query($queryTwo);
	$result_two_array = mysqli_fetch_assoc($result_two);
    
    echo json_encode($result_two_array);