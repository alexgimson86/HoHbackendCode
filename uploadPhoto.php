<?php
    header('Access-Control-Allow-Origin : *');
    include 'connection.php';

    $email = $_SESSION['email'];
    $query = "SELECT * ".
             "FROM `hallofheroes_db`.`users` ".
             "WHERE `email` = '$email';";
    $result = $conn->query($query);
    
    while($row = mysqli_fetch_assoc($result)){
        $userId = $row['idUsers'];
    }
    
    print_r($_FILES);
    $new_image_name = "$userId.jpg";
    move_uploaded_file($_FILES["file"]["tmp_name"], "/home/txsthero/hallofheroesapp.com/img/userAvatars/".$new_image_name);

?>