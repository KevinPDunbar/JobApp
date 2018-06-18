<?php
require_once 'utils/functions.php';
require_once 'User.php';
require_once 'Connection.php';


if (is_logged_in()) {
    header("Location: indexLoggedIn.php");
}

?>

<!doctype html>
		
<html>
<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
     <link href="css/custom.css" rel="stylesheet">
     <script src="js/respond.js"></script>
	 <script src="js/script.js"></script>

</head>
<body>

<div class="row-fluid">
<nav class="navbar nav nav-tabs nav-justified navcolor  ">
<div class="container container-fluid">
 <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1  ">
		 <a  href="index.php"><img src="images/homebutton.png" alt="l." height="30px" width="30px" class="brand " ></a>
		 </div>
		  <div class=" col-lg-2 7 col-md-2  col-sm-6 col-sm-offset-1 col-xs-4 col-xs-offset-1 ">
		 <button type="submit" class=" btn  btcustom3  " onclick="location.href='loginForm.php';">Sign in</button>
		 </div>
       <div class=" col-lg-5  col-md-2  col-sm-3 col-xs-5">
	   <button type="submit" class="  btn btcustom3 " onclick="location.href='latestJobsNotLoggedIn.php';">Latest jobs</button>
	   </div>
		</div>
</div>


<div class="container container-fluid">
		   
		  <div class="row ">
		  
		 <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3  col-sm-12 col-xs-12 ">
	 
	   <a  href="index.php"><img src="images/logoj.png" alt="l."  class=" logo center-block"> </a>
    </div>
       
	   
      
     <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12 ">
	
		  
         <form action="forgotPassword.php" method="POST">      
        
       
		 
          
         <div class="form-group ">
           <label for="what" >Enter the email address you registered your account with</label>
             <input type="email" class="form-control " id="email" name="email" placeholder="">
          </div>
            
          
      
    
            </div>
	  <div class=" form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
		   <button type="submit" class=" btn btcustom2 ">Recover Password</button>
		   </div>
		   
	       
	</div>
	</div>   
           
           
        
        
       
      </form>
         
   
	
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jscript.js"></script>
	 </body>
	 </html>