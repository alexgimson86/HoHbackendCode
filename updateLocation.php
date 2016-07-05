<?php

    header('Access-Control-Allow-Origin : *');
    include 'connection.php';
    $userId = $_SESSION['userId'];
	$latitude = $_POST['latitude'];
	$longitude = $_POST['longitude'];
   
    
    $query = "UPDATE `users` ".
			 "SET `latitude`=$latitude, longitude=$longitude ".
			 "WHERE `idUsers`=$userId;";
    
    if($conn->query($query) === true){
		echo json_encode ("location updated successfully.");
	}
    else{
		echo json_encode ("Error updating record " . $conn->error());
	}
	
	$conn->close();