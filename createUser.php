<?php

require_once 'User.php';
require_once 'UserTableGateway.php';
require_once 'Connection.php';
require_once 'validateUser.php';

$formdata = array();
$errors = array();

validate($formdata, $errors);

if (empty($errors)) {
    $firstName = $formdata['firstName'];
    
    $lastName = $_POST['lastName'];
    $address = $_POST['address'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $user = new User(-1, $firstName, $lastName, $address, $username, $password, $email);

    $connection = Connection::getInstance();

    $gateway = new UserTableGateway($connection);

    $id = $gateway->insert($user);

    header('Location: indexNEW.php');
}
else {
    require 'createUserFormNEW.php';
}