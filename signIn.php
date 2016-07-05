<?php

    header('Access-Control-Allow-Origin : *');
    include 'connection.php';
    $email = $_GET['email'];
	$password = $_GET['password'];
	$doesntExist = -1;
    
    $query = "SELECT * ".
             "FROM `hallofheroes_db`.`users` ".
             "WHERE `email` = '$email' AND `password` = '$password';";
    
    $result = $conn->query($query);
    if(!$result  || mysqli_num_rows($result)==0){
		echo json_encode($doesntExist);
	}
	else{
		$userId;
		while($row = mysqli_fetch_assoc($result)){
			$userId = $row['idUsers'];
			$_SESSION['userId'] = $userId;
		}
		echo json_encode($userId);
	}
	