<?php
	header('Access-Control-Allow-Origin : *');
    include 'connection.php';
	
	$iduser = $_SESSION['userId'];

    $query = "SELECT `firstName`,`lastName`, `avatarUrl`,`latitude`,`longitude` ".
             "FROM `users` ".
             "where `idUsers` <> $iduser;";

    $result = $conn->query($query);
    $result_array = array();

    while($row = mysqli_fetch_assoc($result))
    {
        $result_array[] = $row;
    }
    echo json_encode($result_array);

?>