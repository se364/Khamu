<?php
$database = 'aparker1_grc';
$username = 'aparker1';
$password = 'AParkerDB1!';
$hostname = 'localhost';

$cnxn = @mysqli_connect($hostname, $username, $password, $database)
or die("Error connecting to database: " . mysqli_connect_error());
