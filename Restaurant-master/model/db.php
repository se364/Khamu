<?php
$database = 'semrangr_grc';
$username = 'semrangr_grcuser';
$password = 'Mwtmw26-j';
$hostname = 'localhost';

$cnxn = @mysqli_connect($hostname, $username, $password,$database)
or die("Error connecting to database: " .
    mysqli_connect_error());

//echo "connected!";
?>