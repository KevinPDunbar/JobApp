<?php
require_once 'validateJob.php';
require_once 'utils/functions.php';
require_once 'User.php';

if (!isset($errors)) {
    $errors = array();
}

if (!is_logged_in()) {
    header("Location: loginForm.php");
}

?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply Now</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
     <link href="css/custom.css" rel="stylesheet">
     <script src="js/respond.js"></script>
	 <script src="js/script.js"></script>

</head>
<body>
    
<?php 
        if (isset($errorMessage)) {
            echo '<p>Error: ' . $errorMessage . '</p>';
        }
        $jobTitle = $_GET['jobTitle'];
        $employerEmail = $_GET['employerEmail'];

?>
    
<div class="row-fluid">

 <nav class="navbar nav nav-tabs nav-justified navcolor">
 <div class="container container-fluid">
 <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
		 <a  href="index.php"><img src="images/homebutton.png" alt="l." height="30px" width="30px" class="brand " ></a>
		 </div>
		  <div class=" col-lg-2 7 col-md-2  col-sm-6 col-sm-offset-1 col-xs-4 col-xs-offset-1 ">
		 <button type="submit" class=" btn  btcustom3  " onclick="location.href='logout.php';">Logout</button>
		 </div>
       <div class="col-lg-5  col-md-2  col-sm-3 col-xs-5  ">
	   <button type="submit" class="  btn btcustom3 " onclick="location.href='latestJobsNotLoggedIn.php';">Latest jobs</button>
		 </div>
		 </div>
		</div>
		</div>

<div class="container container-fluid">

		   
		  <div class="row ">
		  
		
      
     <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12 ">
	  
      
       <h1></h1>
	   <hr></hr>
		  
      <form action="Apply.php?jobTitle='.$jobTitle.'" 
              method="POST" enctype="multipart/form-data">      
        
       
		 
          
          <div class="form-group ">
           <label for="what" >First Name</label>
             <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Type Here" required>
          </div>
            
          <div class="form-group">
           <label for="Where">Last Name</label>
             <input type="text" class="form-control " id="lastName" name="lastName" placeholder="Type Here" required>
          </div>
		  
		    <div class="form-group">
           <label for="Category">Email Address</label>
             <input type="email" class="form-control " id="email" name="email" placeholder="Type Here" required>
          </div>
		  
            <div class="form-group">
           <label for="Category">Phone Number</label>
             <input type="tel" class="form-control " id="phone" name="phone" placeholder="Type Here" required>
          </div>
		  
		  <div class="form-group">
           <label for="Category">Cover Letter</label>
             <textarea class="form-control " id="coverLetter" name="coverLetter" rows="3" placeholder="Type Here" required>
          </textarea>
		  </div>
		  <div class="form-group">
                        <input type='hidden' name='jobTitle' value='<?php echo "$jobTitle";?>'/> 
                        <input type='hidden' name='employerEmail' value='<?php echo "$employerEmail";?>'/> 
                        <input type="file" name="uploaded_file" id="uploaded_file" required> 
		  </div>
    
             
          
        <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-12">
		   <button type="submit" class=" btn btcustom2 ">Apply now</button>
		   </div>
        
       
      </form>
         
     </div>
	   
	     
	 </div>
	 </div>
  </body>
  </html>