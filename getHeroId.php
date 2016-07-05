<?php

    header('Access-Control-Allow-Origin : *');
    include 'connection.php';
	$avatarUrl = $_GET['heroAvatar'];
	
   
	$query = "SELECT * ".
             "FROM `hallofheroes_db`.`users` ".
             "WHERE `avatarUrl` = '$avatarUrl';";
			
    $result = $conn->query($query);
	
	if(!$result) {
		echo 'Coult not run query: ' . mysql_error();
	}
	$arrayResult = mysqli_fetch_array($result);
	
	echo $arrayResult['idUsers'];
	
	$conn->close();
?>