<?php
session_start();
require_once("config/connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Page</title>
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="js/javascript.js" defer></script>

</head>
<body>
    <div class="topnav">
    <a href="index.php">Home</a>
    <a href="aboutme.php">About Me</a>
    <a href="myproject.php">My Project</a>
    <a href="myhobbies.php">My Hobbies</a>
    <a href="contactus.php">Contact Us</a>

    <div class="topnav-right">
        <?php
        if (isset($_SESSION["control"])) {
        ?>
        <div class= "usertitle">
        Hello <?php print $_SESSION["control"]["firstname"];
        ?>
        </div>
        <a href = "process.php?signout" >Sign Out</a>
        <?php
        }
        ?>

 
    </div>
</div>