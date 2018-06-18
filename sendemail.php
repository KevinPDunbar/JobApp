<?php
if(isset($_POST['submit'])) {
 $emailAddress = 'kevin.p.dunbar@gmail.com';
 require_once "classes/class.phpmailer.php";
$msg = 'First Name:'.$_POST['firstName'].'<br /> Last name:'.$_POST['lastName'].'<br /> Email:'.$_POST['email'].'<br />';
move_uploaded_file($_FILES["uploaded_file"]["tmp_name"], $_FILES["uploaded_file"]["name"]);
  $mail = new PHPMailer();
  $mail->IsMail();

  $mail->AddReplyTo($_POST['email'], $_POST['name']);
  $mail->AddAddress($emailAddress);
  $mail->SetFrom($_POST['email'], $_POST['name']);
  $mail->Subject = "Subject";
  $mail->MsgHTML($msg);
  $mail->AddAttachment( $_FILES["uploaded_file"]["name"]);
  $mail->Send();

}
  ?>