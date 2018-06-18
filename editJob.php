<?php
require_once 'Job.php';
require_once 'JobTableGateway.php';
require_once 'Connection.php';
require_once 'validateJob.php';

$formdata = array();
$errors = array();

validate($formdata, $errors);

if (empty($errors)) {
    $id = $_POST['id'];
    
    $jobTitle = $formdata['jobTitle'];
    
    $jobDescription = $_POST['jobDescription'];
    $address = $_POST['address'];
    $jobType = $_POST['jobType'];
    $lat= $_POST['lat'];
    $lng = $_POST['lng'];
    $employer = $_POST['employer'];
    $email = $_POST['email'];

    $job = new Job($id, $jobTitle, $jobDescription, $address, $jobType, $lat, $lng, $employer, $email);

    $connection = Connection::getInstance();

    $gateway = new JobTableGateway($connection);

    $id = $gateway->update($job);

    header('Location: jobView.php');
}
else {
    require 'editJobForm.php';
}