<?php
$database = '';
$username = '';
$password = '';
$hostname = 'localhost';

$cnxn = @mysqli_connect($hostname, $username, $password, $database)
or die("Error connecting to database: " . mysqli_connect_error());
