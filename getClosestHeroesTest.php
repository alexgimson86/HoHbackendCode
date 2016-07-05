<?php
	header('Access-Control-Allow-Origin : *');
    include 'connection.php';
	
    //$userId = $_SESSION['userId'];  ---not working

    $email = $_GET['email'];
    
    //Gets the userID using the email because $_SESSION is not working
    $userIdQuery = "SELECT * ".
            "FROM `hallofheroes_db`.`users` ".
            "WHERE `email` = '$email';";

    $emailResult = $conn->query($userIdQuery);

    if(!$emailResult) {
            echo 'Coult not run query: ' . mysql_error();
    }
    $arrayResult = mysqli_fetch_array($emailResult);
    $userId = $arrayResult['idUsers'];

    $query = "SELECT `firstName`,`lastName`, `avatarUrl`,`latitude`,`longitude` ".
             "FROM `users` ".
             "where `idUsers` <> $userId;";

    $result = $conn->query($query);
    $result_array = array();

    while($row = mysqli_fetch_assoc($result))
    {
        $result_array[] = $row;
    }
    echo json_encode($result_array);

?>