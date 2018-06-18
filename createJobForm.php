<?php
require_once 'validateJob.php';

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
        <h1>Create Job Form</h1>
        <?php 
        if (isset($errorMessage)) {
            echo '<p>Error: ' . $errorMessage . '</p>';
        }
        
        ?>
        <form action="createJob.php" 
              method="POST">
            <table border="0">
                <tbody>
                    <tr>
                        <td>Title</td>
                        <td>
                            <input type="text" name="jobTitle" value="" />
                            <span id="emailError" class="error">
                                <?php echoValue($errors, 'jobTitle'); ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>
                            <input type="text" name="jobDescription" value="" />
                            <span id="emailError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>
                            <input type="text" name="address" value="" />
                        </td>
                    </tr>
                    <tr>
                        <td>Type</td>
                        <td>
                            <input type="text" name="jobType" value="" />
                        </td>
                    </tr>
                    <tr>
                        <td>Latitude</td>
                        <td>
                            <input type="text" name="lat" value="" />

                        </td>
                    </tr>
                   <tr>
                        <td>Longitude</td>
                        <td>
                            <input type="text" name="lng" value="" />

                        </td>
                    </tr>
                    <tr>
                        <td>Employer</td>
                        <td>
                            <input type="text" name="employer" value="" />

                        </td>
                    </tr>
                     <tr>
                        <td>Email</td>
                        <td>
                            <input type="text" name="email" value="" />

                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Create Job" name="createJob" />
                        </td>
                    </tr>
                </tbody>
            </table>

        </form>
    </body>
</html>
