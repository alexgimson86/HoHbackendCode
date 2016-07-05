<?php

    header('Access-Control-Allow-Origin : *');
    include 'connection.php';
    $userId  = $_SESSION['userId'];
    
    $query = "SELECT * ".
             "FROM `hallofheroes_db`.`users` ".
             "WHERE `idUsers` = $userId;";
    
    $result = $conn->query($query);
    
    $result_array = mysqli_fetch_assoc($result);
    
    echo json_encode($result_array['pendingCall']);