<?php
    $host = "mysql.hallofheroesapp.com";
    $db = "hallofheroes_db";  //database name
    $user = "txsthero"; // user
    $pass = "Teamw0rk"; // pass

    $conn = new mysqli($host, $user, $pass, $db);
    if ($conn->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        exit();
    }
	session_start();
