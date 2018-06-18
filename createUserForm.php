<!doctype html>
<html>
<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
	  
     
       <h1>Register</h1>
	   <hr></hr>
		  
      <form action="createUser.php" method="POST">      
        
       
		 
          
          <div class="form-group ">
           <label for="what" >First Name</label>
           <input type="text" class="form-control" id="firstName" name="firstName"  required="">
          </div>
            
          <div class="form-group">
           <label for="Where">Last Name</label>
           <input type="text" class="form-control " id="lastName" name="lastName"  required="">
          </div>
		  <div class="form-group">
           <label for="Where">Address</label>
           <input type="text" class="form-control " id="address" name="address"  required="">
          </div>
	
		  
            <div class="form-group">
           <label for="Category">Email Address</label>
           <input type="email" class="form-control " id="email" name="email"  required="">
          </div>
		  
		  <div class="form-group">
           <label for="Category">Username</label>
           <input type="text" class="form-control " id="username" name="username"  required="">
          </div>
		  
            <div class="form-group">
           <label for="Category">Password</label>
           <input type="password" class="form-control " id="password" name="password"  required="">
          </div>
          
		 
    
            <div class=" form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
   <button type="submit" class=" btn btcustom2 ">Register Now</button>
   </div>
           
		  
	      
           
        
        
       
      </form>
         
     </div>
    
  
		   </div>
		   </div>
		   </body>
		   </html>
		   