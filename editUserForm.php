<?php
require_once 'User.php';
require_once 'Connection.php';
require_once 'UserTableGateway.php';



if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (!isset($_GET['id'])) {
        die("Illegal request");
    }
    $id = $_GET['id'];

    $connection = Connection::getInstance();
    $gateway = new UserTableGateway($connection);

    $statement = $gateway->getUserById($id);

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
        <h1>Edit User Form</h1>
        <?php 
        if (isset($errorMessage)) {
            echo '<p>Error: ' . $errorMessage . '</p>';
        }
        ?>
        <form action="editUser.php" 
              method="POST">
            <input type="hidden" name="id" value="<?php echo $row['id'];; ?>" />
            <table border="0">
                <tbody>
                    <tr>
                        <td>First Name</td>
                        <td>
                            <input type="text" name="firstName" value="<?php echo $row['firstName']; ?>" />
                            
                        </td>
                    </tr>
                    <tr>
                        <td>Last Name</td>
                        <td>
                            <input type="text" name="lastName" value="<?php echo $row['lastName']; ?>" />
                            <span id="emailError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>
                            <input type="text" name="address" value="<?php echo $row['address']; ?>" />
                            <span id="mobileError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Username</td>
                        <td>
                            <input type="text" name="username" value="<?php echo $row['username']; ?>" />
                            <span id="staffNumberError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>
                            <input type="text" name="password" value="<?php echo $row['password']; ?>" />
                            <span id="skillsError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>
                            <input type="text" name="email" value="<?php echo $row['email']; ?>" />
                            <span id="salaryError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>CV</td>
                        <td>
                            <input type="file" name="cv"><br>
                            <input type="submit" value="Upload file">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Update User" name="editUser" />
                        </td>
                    </tr>
                </tbody>
            </table>

        </form>
    </body>
</html>
