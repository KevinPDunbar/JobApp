<?php
require_once 'validateUser.php';

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
        <h1>Create User Form</h1>
        <?php 
        if (isset($errorMessage)) {
            echo '<p>Error: ' . $errorMessage . '</p>';
        }
        
        ?>
        <form action="createUser.php" 
              method="POST">
            <table border="0">
                <tbody>
                    <tr>
                        <td>First Name</td>
                        <td>
                            <input type="text" name="firstName" value="" />
                            <span id="emailError" class="error">
                                <?php echoValue($errors, 'firstName'); ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Last Name</td>
                        <td>
                            <input type="text" name="lastName" value="" />
                            <span id="emailError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Home Address</td>
                        <td>
                            <input type="text" name="address" value="" />
                            <span id="emailError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Username</td>
                        <td>
                            <input type="text" name="username" value="" />
                        </td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>
                            <input type="text" name="password" value="" />
                        </td>
                    </tr>
                    <tr>
                        <td>email</td>
                        <td>
                            <input type="text" name="email" value="" />

                        </td>
                    </tr>
                   
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Create User" name="createUser" />
                        </td>
                    </tr>
                </tbody>
            </table>

        </form>
    </body>
</html>
