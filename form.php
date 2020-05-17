<?php
ini_set('display_errors', '1');
//connect mysql
if(isset($_POST['Submit']))
{
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$EMAIL = $_POST['EMAIL'];
$address = $_POST['address'];
$message = $_POST['message'];
$phone = $_POST['phone'];

//connection
$conn = new mysqli('localhost', 'root', '','a-1wireless');
if($conn->connect_error){
    die('connection Faild :' .$conn->connect_error);
}
    else{
    $stmt = $conn->prepare("INSERT INTO contactform(firstName, lastName, email, address, message, phone) VALUES(?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssi", $firstName, $lastname, $email, $address, $message, $phone);
    $stmt->execute();
    echo "Perfect ! We Got Your Information";
    $stmt->close();
    $conn->close();
}
}
?>