<?php

function echoValue($array, $fieldName) {
    if (isset($array) && isset($array[$fieldName])) {
        echo $array[$fieldName];
    }
}

function validate(&$fdata, &$errorMessages) {
    $input_method = INPUT_POST;
    
    $fdata['jobTitle'] = filter_input($input_method, "jobTitle", FILTER_SANITIZE_STRING);

    if ($fdata['jobTitle'] === NULL ||
            $fdata['jobTitle'] === FALSE ||
            $fdata['jobTitle'] === "") {
        $errorMessages['jotTitle'] = "Job Title Required";
    }
}

