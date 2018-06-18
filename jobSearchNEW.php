<?php

require_once 'utils/functions.php';
require_once 'User.php';
require_once 'Job.php';
require_once 'Connection.php';
require_once 'JobTableGateway.php';



/*if (!is_logged_in()) 
{
    header("Location: loginForm.php");
}*/

if(is_logged_in())
{
   start_session();
   $user = $_SESSION['user'];   
}

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
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, minimum-scale=1">
        <title>Job Search</title>
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
    </head>
    <body>
     
<?php require 'h-f/header.php' ?>

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
                    . '<a href="viewJobNEW.php?id='.$row['id'].'" class=" btn btcustom1 ">View</a> '
                    . '</td>';
                    echo '</tr>';
                   $row = $statement->fetch(PDO::FETCH_ASSOC);
                }
                ?>
            </tbody>
        </table>

    <p align="center">No more jobs found</p>
  </div> 
</body>
</html>

