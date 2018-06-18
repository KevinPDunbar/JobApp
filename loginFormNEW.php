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

      <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12 ">
        <h1 style="padding-top: 50px;">Sign in</h1>
           
       <form action="login.php" method="POST">               
        <div class="form-group ">
        <?php
         if (isset($_GET["msg"]) && $_GET["msg"] == 'wrongUsername') {
          echo "<p>Username Does Not Exist</p>";
          }       
       ?>
         <label for="what" >Username</label>
         <input type="text" class="form-control" id="username" name="username" placeholder="Username" required="">
        </div>
          
        <div class="form-group">
        <?php
         if (isset($_GET["msg"]) && $_GET["msg"] == 'wrongPassword') {
          echo "<p>Incorrect Password</p>";
          }   
       ?>
         <label for="Where">Password</label>
         <input type="password" class="form-control " id="password" name="password" placeholder="Password" required="">
        </div>

        <button type="submit" class=" btn btcustom2 ">Sign In</button>
       </form>
     </div>

    <div class="  col-lg-4 col-xs-12 col-sm-4 col-md-4">
      <input type="button" class="btn btcustom2" onclick="location.href='forgotPasswordFormNEW.php';" value="Forgot Password?" />
      <input type="button" class="btn btcustom2" onclick="location.href='createUserFormNEW.php';" value="Create Account" />
    </div>

    </body>
</html>