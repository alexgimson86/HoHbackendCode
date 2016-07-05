<?php

    header('Access-Control-Allow-Origin : *');
    include 'connection.php';
    
    ini_set("display_errors", "1");
    error_reporting(E_ALL);
    
    $email = $_POST['email'];
    $pw = $_POST['password'];
    $sex = $_POST['sex'];
    //$avatarUrl = $_POST['avatarUrl'];
    $heroOneAv = $_POST['heroOneAv'];
    $heroTwoAv = $_POST['heroTwoAv'];
    $heroThrAv = $_POST['heroThrAv'];


    //this query grabs the userId using the email
    $userIdQuery = "SELECT * ".
            "FROM `hallofheroes_db`.`users` ".
            "WHERE `email` = '$email';";

    $result = $conn->query($userIdQuery);

    if(!$result) {
            echo 'Coult not run query: ' . mysql_error();
    }
    $arrayResult = mysqli_fetch_array($result);

    $userId = $arrayResult['idUsers'];
    $_SESSION['userId'] = $userId;
    $avatarUrl = "http://www.hallofheroesapp.com/img/userAvatars/$userId.jpg";
    Print_r ($_SESSION);
    
    
    //this query grabs the userId of hero1 based on their avatarUrl
    $heroOneIdQuery = "SELECT * ".
            "FROM `hallofheroes_db`.`users` ".
            "WHERE `avatarUrl` = '$heroOneAv';";
    $resultOne = $conn->query($heroOneIdQuery);
    if(!$result) {
            echo 'Coult not run query: ' . mysql_error();
    }
    
    $arrayResultOne = mysqli_fetch_array($resultOne);
    $heroOneId = $arrayResultOne['idUsers'];

    //this query grabs the userId of hero2 based on their avatarUrl
    $heroTwoIdQuery = "SELECT * ".
            "FROM `hallofheroes_db`.`users` ".
            "WHERE `avatarUrl` = '$heroTwoAv';";
    $resultTwo = $conn->query($heroTwoIdQuery);
    if(!$resultTwo) {
            echo 'Coult not run query: ' . mysql_error();
    }
    
    $arrayResultTwo = mysqli_fetch_array($resultTwo);
    $heroTwoId = $arrayResultTwo['idUsers'];

    //this query grabs the userId of hero3 based on their avatarUrl
    $heroThrIdQuery = "SELECT * ".
            "FROM `hallofheroes_db`.`users` ".
            "WHERE `avatarUrl` = '$heroThrAv';";
    $resultThr = $conn->query($heroThrIdQuery);
    if(!$resultThr) {
            echo 'Coult not run query: ' . mysql_error();
    }
    
    $arrayResultThr = mysqli_fetch_array($resultThr);
    $heroThrId = $arrayResultThr['idUsers'];

    //Now, these 2 queries update the user table and hero table, respectively
    $userQuery = "UPDATE `hallofheroes_db`.`users`".
                    "SET `password` = '$pw', `avatarUrl` = '$avatarUrl', `sex` = '$sex', `disclaimer` = 'Y'".
                    "WHERE `email` = '$email';";

    $heroQuery = "INSERT INTO `hallofheroes_db`.`heroes` (`userId`, `heroId`)".
                    "VALUES ('$userId', '$heroOneId'), ('$userId', '$heroTwoId'), ('$userId', '$heroThrId');";


    if($conn->query($userQuery) === true){
        echo json_encode ("new user updated successfully.");
    }
    else {
        echo json_encode ("Error adding new user ");
    }
	
    if($conn->query($heroQuery) === true){
        echo json_encode ("new heroes updated successfully.");
    }
    else {
        echo json_encode ("Error adding new heroes ".$heroTwoId);
    }
?>