<?php
require_once 'User.php';
require_once 'Connection.php';
require_once 'UserTableGateway.php';

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
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Address</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    echo '<tr>';
                    echo '<td>' . $row['firstName'] . '</td>';
                    echo '<td>' . $row['lastName'] . '</td>';
                    echo '<td>' . $row['address'] . '</td>';
                    echo '<td>' . $row['username'] . '</td>';
                    echo '<td>' . $row['password'] . '</td>';
                    echo '<td>' . $row['email'] . '</td>';
                    echo '<td>'
                    . '<a href="editUserForm.php?id='.$row['id'].'">Edit</a> '
                    . '<a href="deleteUser.php?id='.$row['id'].'">Delete</a> '
                    . '</td>';
                    echo '</tr>';            
                ?>
            </tbody>
        </table>
    </body>
</html>
