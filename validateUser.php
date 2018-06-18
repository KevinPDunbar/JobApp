<?php

function echoValue($array, $fieldName) {
    if (isset($array) && isset($array[$fieldName])) {
        echo $array[$fieldName];
    }
}

function validate(&$fdata, &$errorMessages) {
    $input_method = INPUT_POST;
    
    $fdata['firstName'] = filter_input($input_method, "firstName", FILTER_SANITIZE_STRING);

    if ($fdata['firstName'] === NULL ||
            $fdata['firstName'] === FALSE ||
            $fdata['firstName'] === "") {
        $errorMessages['firstName'] = "Name required";
    }
}

