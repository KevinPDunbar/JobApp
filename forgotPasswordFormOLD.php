


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
        <nav class="navbar navcolor ">
		<div class=" col-lg-4 pull-right col-md-4 pull-right col-sm-4 pull-right ">
		 <input type="button" class="btn  btn1" onclick="location.href='login.php';" value="Register/Sign in" />

	   <button type="submit" class="  btn  btn1  ">Latest jobs</button>
	    
	
		</div>
		
		</div>
		</div>
		

        
		 
            
                      

       
			
 
		  <div class="container">
		   
		  <div class="row ">
		  
		
      
     <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 col-xs-4 col-xs-offset-1 ">
      <a class="brand" href="index.html"><img src="images/logoj.png" alt="l." height="230px" width="296px" class="  center-block"> </a>
		  
      <form action="forgotPassword.php" method="POST">      
        
       
		 
          
          <div class="form-group ">
           <label for="Email Address" >Email Address</label>
             <input type="email" class="form-control input-large" id="email" name="email" placeholder="Enter your registered email address" required>
             <span class="error">
                <?php if (isset($errors['username'])) echo $errors['username']; ?>
            </span>
          </div>
            
		 
		   <button type="submit" class=" btn btcustom ">Send Password</button>
	       <a data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
	   </a>
           
        
        
       
      </form>
         
     </div>
  
  
  

<!--javascript-->
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jscript.js"></script>

</body>
</html>
