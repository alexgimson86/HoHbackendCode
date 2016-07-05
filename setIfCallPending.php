<?php
    header('Access-Control-Allow-Origin : *');
	//header('Content-Type: application/json');
    include 'connection.php';
	$userId = $_SESSION['userId'];
	$isPending = $_POST['isPending'];
	$query = $queryTwo = $firstName = $lastName = $userTwo = '';
	
	if($isPending == 0){
		$firstName = $_POST['firstName'];
		$lastName = $_POST['lastName'];
	
		$queryOne = "SELECT `idUsers` ".
					"FROM `hallofheroes_db`.`users` ".
					"WHERE `lastName` = '$lastName' AND `firstName` = '$firstName' AND `pendingCall` = 1;";
		
		$result = $conn->query($queryOne);
		
		while($row = $result->fetch_assoc()){
			$userTwo = $row['idUsers'];
		}
		
		
		$query = "UPDATE `hallofheroes_db`.`users` ".
				 "SET ".
				 "`pendingCall` = 0 ".
				 "WHERE `idUsers` = $userTwo;";	
	}
	else{
		$query = "UPDATE `hallofheroes_db`.`users` ".
				 "SET ".
				 "`pendingCall` = 1 ".
				 "WHERE `idUsers` = $userId;";
	}
	if($isPending == 0){
		$queryTwo = "INSERT INTO `hallofheroes_db`.`calls` ".
				 "(`idcalls`,`location`,`dangerLevel`,`distanceTravelled`,".
				 "`wasCompleted`,`callerUserId`,`receiverUserId`,`timeStamp`,".
				 "`pointsEarned`) ".
				 " VALUES ".
				 "(NULL,NULL,NULL,NULL,0,$userTwo,$userId,NULL,NULL);";
	}
    if($conn->query($query) === true && $conn->query($queryTwo) === true){
		echo json_encode("Call pending set successfully and call table updated ");
		//echo json_encode($query);
	}
    else{
		echo json_encode("call pending not set successfully .");
		//echo json_encode($query);
	}
	/*if($conn->query($queryTwo) === true){
		echo json_encode("succesfully updated call table.");
	}
	else{
		echo json_encode($queryTwo);
	}*/
	$conn->close();