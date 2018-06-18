<!doctype html>
<html>
<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
     <link href="css/custom.css" rel="stylesheet">
     <script src="js/respond.js"></script>
	 <script src="js/script.js"></script>

</head>
<body>
<div class="row-fluid">
<nav class="navbar nav nav-tabs nav-justified navcolor  ">
<div class="container container-fluid">
 <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
		 <a  href="index.php"><img src="images/homebutton.png" alt="l." height="30px" width="30px" class="brand " ></a>
		 </div>
		 </div>
		</div>
		</div>

<div class="container container-fluid">
		   
		  <div class="row ">
		  
		
      
     <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12 ">
	   <a class="brand" href="index.php"><img src="images/logoj.png" alt="l." height="230px" width="296px" class="  center-block"> </a>
    
       <h1>Sign in</h1>
       
       <?php
       
       if (isset($_GET["msg"]) && $_GET["msg"] == 'wrongUsername') {
        echo "<p>Username Does Not Exist</p>";
        }
       
       if (isset($_GET["msg"]) && $_GET["msg"] == 'wrongPassword') {
        echo "<p>Incorrect Password</p>";
        }
        
       
       ?>

		  
      <form action="login.php" method="POST">      
        
       
		 
          
          <div class="form-group ">
           <label for="what" >Username</label>
           <input type="text" class="form-control" id="username" name="username" placeholder="Username" required="">
          </div>
            
          <div class="form-group">
           <label for="Where">Password</label>
           <input type="password" class="form-control " id="password" name="password" placeholder="Password" required="">
          </div>
		 
		 
          <button type="submit" class=" btn btcustom2 ">Sign In</button>
             
         
           
        
        
       
      </form>
         
     </div>
	   <div class="  col-lg-4 col-xs-12 col-sm-4 col-md-4">
		   
		   </div>
		   <div class="  col-lg-4 col-xs-12 col-sm-4 col-md-4">
		   
	       <input type="button" class="btn btcustom2" onclick="location.href='forgotPasswordForm.php';" value="Forgot Password?" />
                <input type="button" class="btn btcustom2" onclick="location.href='createUserForm.php';" value="Create Account" />

	      </div>
	</div>
	</div>
	
	
	 </body>
	 </html>
	 
  