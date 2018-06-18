<?php

require_once 'User.php';
require_once 'Connection.php';
require_once 'UserTableGateway.php';



$connection = Connection::getInstance();
$gateway = new UserTableGateway($connection);

$email = $_POST['email'];
$statement = $gateway->getUserByEmail($email);
$row = $statement->fetch(PDO::FETCH_ASSOC);
$password = $row['password'];

    
$to = $email;
$subject = "Your Account Password";
$txt = "Your account password is: " . $password;
$headers = "From: webmaster@JobApp.com" . "\r\n" .
"CC: CCexample@example.com";

mail($to,$subject,$txt,$headers);


header('Location: loginFormNEW.php');