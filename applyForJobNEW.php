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
       <?php echo '<h1 style="padding-top: 50px;">'. $jobTitle .'</h1>'; ?>
	     <hr></hr>
		  
      <form action="Apply.php?jobTitle='.$jobTitle.'" method="POST" enctype="multipart/form-data">      
          <div style="" class="form-group ">
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