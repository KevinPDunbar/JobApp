<?php
require_once 'validateJob.php';
require_once 'utils/functions.php';
require_once 'User.php';

if (!isset($errors)) {
    $errors = array();
}

if (isset($errorMessage)) 
{
  echo '<p>Error: ' . $errorMessage . '</p>';
}

$jobTitle = $_GET['jobTitle'];
$employerEmail = $_GET['employerEmail'];

?>
<!doctype html>
<html>
  <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, minimum-scale=1">
      <link rel="stylesheet" type="text/css" href="css/main.css">
      <link rel="stylesheet" type="text/css" href="css/custom.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script src="js/main.js"></script>
      <meta charset=utf-8 />
      <title>Workr</title>
  </head>
    <body>
            
      <?php require 'h-f/header.php' ?>

      <div class="container container-fluid">       
      <div class="row ">
      <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12 ">

        <form action="forgotPassword.php" method="POST">      
         <div class="form-group ">
           <label style="padding-top: 200px;" for="what" >Enter the email address you registered your account with</label>
             <input type="email" class="form-control " id="email" name="email" placeholder="">
          </div>
            
          </div>
          <div class=" form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <button type="submit" class=" btn btcustom2 ">Recover Password</button>
          </div>
          </form>   
      </div>
      </div>   
           

    </body>
</html>