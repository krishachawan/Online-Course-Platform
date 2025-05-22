<?php
    $firstname = $_post['firstname'];
    $lastname = $_post['lastname'];
    $email = $_post['email'];
    $password = $_post['password'];

    //database connection
    $conn = new mysqli('localhost', 'root', '','test');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }
    else{
        $stmt = $conn->prepare("insert into registration(firstname, lastname, email, password) values(?, ?, ?, ?)");
        $stmt->bind_param("ssss", $firstname, $lastname, $email, $password);
        $stmt->execute();
        echo "registration successful!";
        $stmt->close();
        $conn->close();
    }
    
?>