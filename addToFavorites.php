<?php
require_once 'Favorites.php';
require_once 'FavoritesTableGateway.php';
require_once 'Connection.php';


if (!isset($_GET['id'])) {
    die("Illegal request");
}
$jobId = $_GET['id'];
$userId = $_GET['userId'];
//echo $jobId;
//echo $userId;


  $favorite = new Favorites(-1, $userId, $jobId);

    $connection = Connection::getInstance();

    $gateway = new FavoritesTableGateway($connection);

    $id = $gateway->insert($favorite);

    header("location:javascript://history.go(-1)");




?>
