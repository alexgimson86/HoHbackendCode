<?php

    header('Access-Control-Allow-Origin : *');
    include 'connection.php';
     $userPoints = $_GET['userPoints'];
	 $idUsers = $_GET['idUsers'];
	  
	  
    $query = "UPDATE `users` ".
			 "SET `userPoints`=$userPoints ".
			 "WHERE `idUsers`=$idUsers;";

       
    
    $result = $conn->query($query);
    $result_array = array();
    
    while($row = mysqli_fetch_assoc($result))
    {
        $result_array[] = $row;
    }
    echo json_encode($result_array);


