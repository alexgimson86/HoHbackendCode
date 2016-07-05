<?php

    header('Access-Control-Allow-Origin : *');
    include 'connection.php';
    
    $query = "SELECT * ".
             "FROM `hallofheroes_db`.`stores` ;";
       
    
    $result = $conn->query($query);
    $result_array = array();
    
    while($row = mysqli_fetch_assoc($result))
    {
        $result_array[] = $row;
    }
    echo json_encode($result_array);


