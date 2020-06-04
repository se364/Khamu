<?php

function validName($name)
{
    return !empty(trim($name));
}

function validEmail($email){
    return !empty(trim($email)) && strpos($email, "@") && strpos($email, ".");
}

function validPhone($phone){
    return !empty(trim($phone) && strlen($phone) == 10);
}

function validDate($date){
    $explodeDate = explode("-", $date);
    $year = $explodeDate[0];
    $month = $explodeDate[1];
    $day = $explodeDate[2];

    return checkdate($month, $day, $year);
}
