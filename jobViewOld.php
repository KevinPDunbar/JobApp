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

$statement = $gateway->getJobs();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>

    </head>
    <body>

        
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Address</th>
                    <th>Type</th>
                    <th>Employer</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                while ($row) {
                    echo '<tr>';
                    echo '<td>' . $row['jobTitle'] . '</td>';
                    echo '<td>' . $row['jobDescription'] . '</td>';
                    echo '<td>' . $row['address'] . '</td>';
                    echo '<td>' . $row['jobType'] . '</td>';
                    echo '<td>' . $row['employer'] . '</td>';
                    echo '<td>'
                    . '<a href="viewJob.php?id='.$row['id'].'">View</a> '
                    . '<a href="editJobForm.php?id='.$row['id'].'">Edit</a> '
                    . '<a class="delete" href="deleteJob.php?id='.$row['id'].'">Delete</a> '
                            
                    . '<a class="addToFavorites" href="addToFavorites.php?id='.$row['id'].'&userId='.$user->getId().'">Add to Favorites</a> '
                    . '<a class="getFavoritesById" href="viewFavorites.php?userId='.$user->getId().'">View Favorites</a> '
                            
                    . '</td>';
                    echo '</tr>';
                    
                    $row = $statement->fetch(PDO::FETCH_ASSOC);
                }
                ?>
            </tbody>
        </table>
        <p><a href="createJobForm.php">Create Job</a></p>

    </body>
</html>
