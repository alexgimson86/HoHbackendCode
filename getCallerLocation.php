<?php

    header('Access-Control-Allow-Origin : *');
    include 'connection.php';
	$firstName = $_GET['firstName'];
	$lastName = $_GET['lastName'];
    
    $query = "SELECT `latitude`,`longitude` ".
             "FROM `hallofheroes_db`.`users` ".
			 "WHERE `firstName` = '$firstName' AND `lastName` = '$lastName' AND `pendingCall` = 1;";
       
    
    $result = $conn->query($query);
    $result_array = array();
    
    while($row = mysqli_fetch_assoc($result))
    {
        $result_array[] = $row;
    }
    echo json_encode($result_array);
