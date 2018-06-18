<?php
require_once 'Favorites.php';
require_once 'FavoritesTableGateway.php';
require_once 'Connection.php';


if (!isset($_GET['userId'])) {
    die("Illegal request");
}
$userId = $_GET['userId'];
$jobId = $_GET['jobId'];
//echo $userId;
//echo $jobId;



$connection = Connection::getInstance();

$gateway = new FavoritesTableGateway($connection);

$gateway->delete($userId, $jobId);

header("location:javascript://history.go(-1)");
