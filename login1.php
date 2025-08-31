<?php

//create database connection
$connection = mysqli_connect('localhost','root','','signupdb');


//rtrive user name and password
$username = $_POST["username"];
$password = $_POST["password"];

//run query to obtain user name and password from signup tables
$query = "SELECT * FROM  signupdet WHERE username =? and password = ?";
$sendto = $connection->prepare($query);
$sendto->bind_param("ss",$username,$password);
$sendto->execute();
$result = $sendto->get_result();

if($result->num_rows == 0){
    echo "Login Successful";
}else{
    echo "Invalid Username or Password";
}
$sendto->close();
$connection->close();
?>