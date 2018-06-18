<?php
require_once 'utils/functions.php';
require_once 'User.php';
require_once 'Favorites.php';
require_once 'Connection.php';
require_once 'FavoritesTableGateway.php';

start_session();

if (!is_logged_in()) {
    header("Location: loginForm.php");
}

$user = $_SESSION['user'];

$connection = Connection::getInstance();
$gateway = new FavoritesTableGateway($connection);

$userId = $_GET['userId'];

$statement = $gateway->getFavoritesById($userId);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favorite Jobs</title>
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
    <button type="submit" class=" btn  btcustom3  " onclick="location.href='logout.php';">Logout</button>
</div>
<div class=" col-lg-5  col-md-2  col-sm-3 col-xs-5 ">
    <button type="submit" class="  btn btcustom3 " onclick="location.href='latestJobsLoggedIn.php';">Latest jobs</button>
</div>
</div>
</div>

      <a href="mapTest.php" class=" btn btcustom1 ">Map View</a>
      
        

      
<div class = "table-responsive">
   <table class = "table">
        
      <?php
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                while ($row) {
                    echo '<tr>';
                    echo '<td>' . $row['jobTitle'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>' . $row['address'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>' . $row['jobType'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>' . $row['employer'] . '</td>';
                    echo '</tr>';
                    echo '<td>'
                    . '<a href="viewJob.php?id='.$row['id'].'" class=" btn btcustom1 ">View</a> '
                    . '<br>'
                    . '<a class=" btn btcustom1 "  href="removeFromFavorites.php?userId='.$user->getId().'&jobId='.$row['id'].'">Remove From Favorites</a> '
                    . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>'
                    
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






