<?php
require_once 'Job.php';
require_once 'Connection.php';
require_once 'JobTableGateway.php';
require_once 'utils/functions.php';
require_once 'User.php';

if (!isset($_GET['id'])) {
    die("Illegal request");
}

$id = $_GET['id']; 

$connection = Connection::getInstance();
$gateway = new JobTableGateway($connection);

if(is_logged_in())
{
  start_session();
  $user = $_SESSION['user'];#
}

$statement = $gateway->getJobById($id);

$row = $statement->fetch(PDO::FETCH_ASSOC);
if (!$row) {
    die("Illegal request");
}
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
</head>

<body>

  <?php require 'h-f/header.php' ?>
  <div class="container container-fluid"> 
    <div class="row ">  
      <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12 ">
        <?php echo '<h1 style="padding-top: 50px;">'. $row['jobTitle'] .'</h1>'; ?>
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
       <?php
        if(is_logged_in())
        {
          echo '<a href="addToFavorites.php?id='.$row['id'].'&userId='.$user->getId().'" class=" btn btcustom2 ">Add to Favorites</a>';
          echo '<a href="applyForJobNEW.php?id='.$row['id'].'&jobTitle='.$row['jobTitle'].'&employerEmail='.$row['email'].'" class=" btn btcustom2 ">Apply Now</a>';
        } 
        
       ?>
                 
              </div>
                        <hr></hr>
                        
      
         
   </div>
   </div>
  </body>
  </html>