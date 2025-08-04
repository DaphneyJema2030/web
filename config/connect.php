<?php
session_start();
date_default_timezone_set("Africa/Nairobi");
require_once "constants.php";
//create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}else{
    echo"Connected successfully to the database {$dbname}.";
}

?>  