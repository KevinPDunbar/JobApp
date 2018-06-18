<?php
require_once 'Job.php';
require_once 'Connection.php';
require_once 'JobTableGateway.php';
require_once 'utils/functions.php';
require_once 'User.php';

if (!is_logged_in()) {
    header("Location: loginForm.php");
}

if (!isset($_GET['id'])) {
    die("Illegal request");
}
$id = $_GET['id']; 

$connection = Connection::getInstance();
$gateway = new JobTableGateway($connection);

start_session();
$user = $_SESSION['user'];

$statement = $gateway->getJobById($id);

$row = $statement->fetch(PDO::FETCH_ASSOC);
if (!$row) {
    die("Illegal request");
}
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Job</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
     <link href="css/custom.css" rel="stylesheet">
     <script src="js/respond.js"></script>
	 <script src="js/script.js"></script>

</head>
<body>
<div class="row-fluid">

 <nav class="navbar nav nav-tabs nav-justified navcolor">
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
	  
      
      <?php echo '<h1>'. $row['jobTitle'] .'</h1>'; ?>
	   <hr></hr>
		  
      <form>      
        
       
		 
          
          <div class="form-group ">
           <label for="what" >Location:</label>
             <?php echo '<p>'. $row['address'] .'</p>'; ?>
          </div>
            
          <div class="form-group">
           <label for="Where">Type:</label>
            <?php echo '<p>'. $row['jobType'] .'</p>'; ?>
          </div>
          
          <div class="form-group">
           <label for="Where">Employer:</label>
            <?php echo '<p>'. $row['employer'] .'</p>'; ?>
          </div>
		  
		    <div class="form-group">
           <label for="Category">Description</label>
             <?php echo '<p>'. $row['jobDescription'] .'</p>'; ?>
          </div>
		  
		  
		  
    
             
          
        
        
       
      </form>
	  
	  
         
     </div>
            <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-12">
		 <?php echo '<a href="addToFavorites.php?id='.$row['id'].'&userId='.$user->getId().'" class=" btn btcustom2 ">Add to Favorites</a>'?>
               
            </div>
                      <hr></hr>
                      
	   <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-12">
		 <?php echo '<a href="applyForJob.php?id='.$row['id'].'&jobTitle='.$row['jobTitle'].'&employerEmail='.$row['email'].'" class=" btn btcustom2 ">Apply Now</a>'?>
               
            </div>
	       
	 </div>
	 </div>
  </body>
  </html>