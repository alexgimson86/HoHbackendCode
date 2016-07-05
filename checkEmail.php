<?php

    header('Access-Control-Allow-Origin : *');
    include 'connection.php';
    
    
    $email = $_GET['email'];            //gets email from client through AJAX call
    $doesNotExist = false;
    
    $query = "SELECT * ".               //selects user with the matching email
             "FROM `hallofheroes_db`.`users` ".
             "WHERE `email` = '$email';";
    
    $result = $conn->query($query);     //runs query
    
    //Checks if query failed or result is empty
    if(!$result  || mysqli_num_rows($result) == 0) {
        echo json_encode($doesNotExist);
    }
    //else retrieves and returns the user's residence hall from db 
    else {
        $_SESSION['email']=$email;
	$resHall;
	while($row = mysqli_fetch_assoc($result)){
            $resHall = $row['residenceHall'];
        }
	echo ($resHall);
    }