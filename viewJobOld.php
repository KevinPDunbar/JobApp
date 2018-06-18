<?php
require_once 'Job.php';
require_once 'Connection.php';
require_once 'JobTableGateway.php';

if (!isset($_GET['id'])) {
    die("Illegal request");
}
$id = $_GET['id'];

$connection = Connection::getInstance();
$gateway = new JobTableGateway($connection);

$statement = $gateway->getJobById($id);

$row = $statement->fetch(PDO::FETCH_ASSOC);
if (!$row) {
    die("Illegal request");
}
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
                    <th>Admin</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    echo '<tr>';
                    echo '<td>' . $row['jobTitle'] . '</td>';
                    echo '<td>' . $row['jobDescription'] . '</td>';
                    echo '<td>' . $row['address'] . '</td>';
                    echo '<td>' . $row['jobType'] . '</td>';
                    echo '<td>' . $row['employer'] . '</td>';
                    echo '<td>'
                    
               
                    . '<a href="applyForJob.php?id='.$row['id'].'&jobTitle='.$row['jobTitle'].'&employerEmail='.$row['email'].'">Apply Now</a> '
                    . '</td>';
                    echo '</tr>';            
                ?>
            </tbody>
        </table>
    </body>
</html>
