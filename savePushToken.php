<?php

    header('Access-Control-Allow-Origin : *');
    include 'connection.php';
    $token = $_POST['token'];
	$userId = $_SESSION['userId'];

    $query = "UPDATE `hallofheroes_db`.`users` ".
			 "SET ".
			 "`pushToken` = '$token' ".
			 "WHERE `idUsers` = $userId;";
    
    if($conn->query($query) === true){
		echo "record updated successfully.";
	}
    else{
		echo "Error updating record: " . $conn->error;
	}
	$conn->close();