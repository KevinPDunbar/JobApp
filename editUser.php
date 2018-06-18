<?php

require_once 'User.php';
require_once 'UserTableGateway.php';
require_once 'Connection.php';
require_once 'validateUser.php';

$formdata = array();
$errors = array();

validate($formdata, $errors);

if (empty($errors)) {
    $id = $_POST['id'];
    
    $firstName = $formdata['firstName'];
    
    $lastName = $_POST['lastName'];
    $address = $_POST['address'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $cv = $_POST['cv'];

    $user = new User($id, $firstName, $lastName, $address, $username, $password, $email, $cv);

    $connection = Connection::getInstance();

    $gateway = new UserTableGateway($connection);

    $id = $gateway->update($user);

    header('Location: index.php');
}
else {
    require 'editUserForm.php';
}