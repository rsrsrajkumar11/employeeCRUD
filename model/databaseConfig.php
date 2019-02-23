<?php
$host="localhost";
$user="root";
$pass="root";
$database="employeesDB";
$conn= new mysqli($host,$user,$pass,$database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// for testing only
// print_r($conn);
// echo "Connected successfully";

?>


