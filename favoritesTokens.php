<?php
	header('Access-Control-Allow-Origin : *');
    include 'connection.php';
	
	$userId = $_SESSION['userId'];

    $query = "SELECT `pushToken`,`firstName`, `lastName`,`avatarUrl`, `idUsers` ".
             "FROM `users` ".
             "where `idUsers` IN( ".
             "select `heroId` ".
             "FROM `heroes` ".
             "where `heroes`.`userId` = $userId); ";

    $result = $conn->query($query);
    $result_array = array();

    while($row = mysqli_fetch_assoc($result))
    {
        $result_array[] = $row;
    }
    echo json_encode($result_array);

?>