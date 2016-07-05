<?php

    header('Access-Control-Allow-Origin : *');
    include 'connection.php';
    //Print_r ($_SESSION);
    $userId = $_SESSION['userId'];
    
    $query = "SELECT * ".
             "FROM `hallofheroes_db`.`users` ".
             "WHERE `idUsers` = $userId;";
    
    $result = $conn->query($query);
    $result_array = array();
    
    while($row = mysqli_fetch_assoc($result))
    {
        $result_array[] = $row;
    }
    echo json_encode($result_array);

