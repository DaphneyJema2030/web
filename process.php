<?php
require 'config/connect.php';
//check if form is submitted
if (isset($_POST['send_message'])) {
    //retrive form data
    $allname = $_POST['allname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    //validate inputs
    if(empty($allname) || empty($email) || empty($phone) || empty($subject) || empty($message)){
        echo "All fields are required";
        exit;
}



//prepare and bind
$stmt = $conn->prepare("INSERT INTO messages(fullname, email, phone, subject, message) VALUES (?, ?, ?, ?, ?)");
$stmt -> bind_param("sssss",$allname, $email, $phone, $subject, $message);

//execute the statement
if ($stmt -> execute()){
    header("Location: contacts.html?status=success");
    exit;
} else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} else {
    echo "No data submitted.";
}


if (isset($_POST["signup"])) {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    if(empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($confirm_password)){
        echo "All fields are required";
        exit;
    }
    if ($password != $confirm_password){
        echo "Passwords do not match.";
        exit;
     }
      

}

?> 