<?php

session_start();
require '../config/connect.php';
require '../includes/fnc.php';
require '../ pluggins/PHPMailer/sendmail.php';

//check if form is submitted
if (isset($_POST['signup'])) {
    //retrive form data
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $tel = mysqli_real_escape_string($conn, $_POST['tel']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
    $userType = mysqli_real_escape_string($conn, $_POST['userType']);

    if ($password !== $confirm_password){
        echo "Passwords do not match.";
        exit;
     }
    //encrypt password
     $hash_password = password_hash($confirm_password, PASSWORD_DEFAULT);

     $user_insert = "INSERT INTO users(firstname, lastname, email, tel, username, password, userType, created) 
     VALUES ('$firstname', '$lastname', '$email', '$tel', '$username', '$hash_password', '$userType', UNIX_TIMESTAMP())";

     if ($conn->query($user_insert) === TRUE) {
        header("Location: ..signin.php");
        exit;
     } else {
        die("Failed to insert the new record: . $conn->error");
     }

     SendMail($email,"Welcome to Bookworld", "Hi $firstname, Thank you for signing up");
}

//signin form
    if (isset($_POST['signin'])) {
    
    $entered_username = mysqli_real_escape_string($conn, $_POST['username']);
    $entered_password = mysqli_real_escape_string($conn, $_POST['password']);

    //verify if username matches any record
    $spot_username = "SELECT * FROM users WHERE username = '$entered_username' LIMIT 1";

    $uName_res = $conn->query($spot_username);

    if($uName_res->num_rows > 0){
        $_SESSION["control"] = $uName_res->fetch_assoc();

        $stored_password = $_SESSION["control"]["password"];

        if(password_verify($entered_password, $stored_password)){

            header("Location: ../viewUsers.php");
            exit();
            
        } else {
            unset($_SESSION["control"]);
            header("Location: ..signin.php");
            exit();
        }
            } else {
            header("Location: ..signin.php");
            exit;
            }
        }

        //signout
        if (isset($_POST['signout'])) {
            unset($_SESSION['control']);
            header('Location: ../signin.php');
            exit();
        
    }

    //delete a user
    if(isset($_GET['delete_user'])) {

    $userId = $_GET['delete_user'];

    if(empty($userId)) {
        echo "User ID is required.";
        exit;
    }

    $stmt = $conn->prepare("DELETE FROM users WHERE userId = ?");
    $stmt->bind_param("i", $userId);

    if($stmt->execute()) {
        header("Location: ../bookworld.php?status=deleted");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

//update user
if(isset($_POST['update_user'])) {
    // Retrieve form data
    $firstname = ucwords(strtolower($_POST['firstname']));
    $lastname = ucwords(strtolower($_POST['lastname']));
    $email = strtolower($_POST['email']);
    $username = strtolower($_POST['username']);
    $tel = $_POST['tel'];
    $userId = $_POST['userId'];

    // Validate inputs
    if(empty($firstname) || empty($lastname) || empty($email) || empty($username) || empty($tel) || empty($userId)) {
        echo "All fields are required.";
        exit;
    }

    // Prepare and bind
    $stmt = $conn->prepare("UPDATE users SET firstname = ?, lastname = ?, email = ?, username = ?, phone = ? WHERE userId = ?");
    $stmt->bind_param("ssssssi", $firstname, $lastname, $email, $username, $tel, $userId);

    // Execute the statement
    if($stmt->execute()) {
        header("Location: ../persons.php?status=updated");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}


    
?> 