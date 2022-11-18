<?php
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $conn = new mysqli('localhost','root','','ibm');
    if($conn->connect_error){
        echo "$conn->connect_error";
        die("Connection Failed : ". $conn->connect_error);
    } 
    else {
    $stmt = $conn->prepare("insert into signup(username,email,password) values(?,?,?)");
    $stmt->bind_param("sss",$username,$email,$password);
    $execval = $stmt->execute(); 
    echo 'alert("Successfully submitted ")';  
    $stmt->close();
    $conn->close();
    }
?>