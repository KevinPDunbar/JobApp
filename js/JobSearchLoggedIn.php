<?php
require_once 'utils/functions.php';
require_once 'User.php';
require_once 'Job.php';
require_once 'Connection.php';
require_once 'JobTableGateway.php';

start_session();

if (!is_logged_in()) {
    header("Location: loginForm.php");
}

$user = $_SESSION['user'];

$connection = Connection::getInstance();
$gateway = new JobTableGateway($connection);

$jobTitle = $_POST['name'];
$address = $_POST['location'];
$jobType = $_POST['type'];

$statement = $gateway->getJobsBySearch($jobTitle, $address, $jobType);

header("Cache-Control: no cache");
session_cache_limiter("private_no_expire");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Search</title>
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
		  <div class=" col-lg-2 col-lg-offset-7 col-md-2 col-md-offset-7 col-sm-6 col-sm-offset-1 col-xs-6 col-xs-offset-1 ">
		 <button type="submit" class=" btn  btcustom3  " onclick="location.href='logout.php';">Logout</button>
		 </div>
       <div class=" col-lg-2  col-md-2  col-sm-4 col-xs-4 ">
	   <button type="submit" class="  btn btcustom3 " onclick="location.href='latestJobsLoggedIn.php';">Latest jobs</button>
	   </div>
		</div>
</div>

      <a href="mapTest.php" class=" btn btcustom1 ">Map View</a>
      <?php echo' <a class=" btn btcustom1 " href="viewFavorites.php?userId='.$user->getId().'">View Favorites</a>' ?>
        
      <div class = "table-responsive">
   <table class = "table">
      
      
      
      <thead>
         <tr>
            <th>Title</th>
            <th>Address</th>
            <th>Type</th>
            <th>Employer</th>
         </tr>
      </thead>
      
      <?php
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                while ($row) {
                    echo '<tr>';
                    echo '<td>' . $row['jobTitle'] . '</td>';
                    echo '<td>' . $row['address'] . '</td>';
                    echo '<td>' . $row['jobType'] . '</td>';
                    echo '<td>' . $row['employer'] . '</td>';
                    echo '<td>'
                    . '<a href="viewJob.php?id='.$row['id'].'" class=" btn btcustom1 ">View</a> '

                    . '</td>';
                    echo '</tr>';
                    
                    $row = $statement->fetch(PDO::FETCH_ASSOC);
                }
                ?>
            </tbody>
        </table>
      
</div> 
      
         
  

    </body>
</html>
