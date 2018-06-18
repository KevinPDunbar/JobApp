<?php

require_once 'utils/functions.php';
require_once 'User.php';
require_once 'classes/DB.php';
require_once 'classes/UserTable.php';

//start_session();


try {
    $formdata = array();
    $errors = array();
    
    $input_method = INPUT_POST;

    $formdata['username'] = filter_input($input_method, "username", FILTER_SANITIZE_STRING);
    $formdata['password'] = filter_input($input_method, "password", FILTER_SANITIZE_STRING);
    
    
    if (empty($formdata['username'])) {
        $errors['username'] = "Username required";
    }
    

    if (empty($formdata['password'])) {
        $errors['password'] = "Password required";
    }
    if (empty($errors)) {
        
        $username = $formdata['username'];
        $password = $formdata['password'];

        
        $connection = DB::getConnection();
        $userTable = new UserTable($connection);
        $user = $userTable->getUserByUsername($username);

        
        if ($user == null) {
           $errors['username'] = "Username is not registered";
            header("location:loginFormNEW.php?msg=wrongUsername");
        }
        else {
            if ($password !== $user->getPassword()) {
                $errors['password'] = "Password is incorrect";
                //echo "Incorrect Password";
                header("location:loginFormNEW.php?msg=wrongPassword");
            }
        }
    }
    
    if (!empty($errors)) {
        throw new Exception("There were errors. Please fix them.");
    }

    if(empty($errors))
    {
        start_session();
        $_SESSION['user'] = $user;
         header('Location: indexNEW.php');
    }
    
    
    
    
   
}
catch (Exception $ex) {
    
    $errorMessage = $ex->getMessage();
    require 'loginFormNEW.php';
}
?>
