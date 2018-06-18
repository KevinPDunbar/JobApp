<?php
require_once 'Job.php';
require_once 'Connection.php';
require_once 'JobTableGateway.php';

require_once 'validateJob.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
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
}
else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['id'])) {
        die("Illegal request");
    }
    $id = $_POST['id'];
    
    $row = $formdata;
}
else {
    die("Illegal request");
}

if (!isset($errors)) {
    $errors = array();
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Edit Job Form</h1>
        <?php 
        if (isset($errorMessage)) {
            echo '<p>Error: ' . $errorMessage . '</p>';
        }
        ?>
        <form action="editJob.php" 
              method="POST">
            <input type="hidden" name="id" value="<?php echo $row['id'];; ?>" />
            <table border="0">
                <tbody>
                    <tr>
                        <td>Title</td>
                        <td>
                            <input type="text" name="jobTitle" value="<?php echo $row['jobTitle']; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>
                            <input type="text" name="jobDescription" value="<?php echo $row['jobDescription']; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>
                            <input type="text" name="address" value="<?php echo $row['address']; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>Type</td>
                        <td>
                            <input type="text" name="jobType" value="<?php echo $row['jobType']; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>Latitude</td>
                        <td>
                            <input type="text" name="lat" value="<?php echo $row['lat']; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>Longitude</td>
                        <td>
                            <input type="text" name="lng" value="<?php echo $row['lng']; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>Employer</td>
                        <td>
                            <input type="text" name="employer" value="<?php echo $row['employer']; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>
                            <input type="text" name="email" value="<?php echo $row['email']; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Update Job" name="editJob" />
                        </td>
                    </tr>
                </tbody>
            </table>

        </form>
    </body>
</html>
