<?php
require_once 'utils/functions.php';
require_once 'User.php';

start_session();

if (!is_logged_in()) {
    header("Location: loginFormNEW.php");
}
else {
	unset($_SESSION['user']);
	
	header("Location: loginFormNEW.php");
}
?>
