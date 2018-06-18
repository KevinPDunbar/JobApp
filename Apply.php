<?php


require_once 'Connection.php';
require_once 'classes/class.phpmailer.php';

$formdata = array();

     
    $employerEmail = $_POST['employerEmail'];
    $firstName = $_POST['firstName'];
    
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $coverLetter = $_POST['coverLetter'];
    $jobTitle = $_POST['jobTitle'];
  
  
    
    

 $emailAddress = $employerEmail;
 require_once "classes/class.phpmailer.php";
$msg = $firstName  . $lastName . " applied for your job post: " . $jobTitle . "<br>".  "Email: " . $email . "<br>". "Phone: " . $phone ."<br>". $coverLetter;
move_uploaded_file($_FILES["uploaded_file"]["tmp_name"], $_FILES["uploaded_file"]["name"]);
  $mail = new PHPMailer();
  $mail->IsMail();

  $mail->AddReplyTo($_POST['email']);
  $mail->AddAddress($emailAddress);
  $mail->SetFrom($_POST['email']);
  $mail->Subject = "Application for : " .$jobTitle;
  $mail->MsgHTML($msg);
  $mail->AddAttachment( $_FILES["uploaded_file"]["name"]);
  $mail->Send();
  
  header('Location: index.php');