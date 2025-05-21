<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "userdb";

$conn = new mysqli($host,$user,$password,$database);
if ($conn->connect_error){
    die("The connection failed: ". $conn->connect_error);
}

?>