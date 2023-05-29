<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'php_acnt';

// Creating database connection
$con = mysqli_connect($host, $username, $password, $database);

// Check database connection
if (!$con) {
    die('Connection failed: ' . mysqli_Connect_error());
} else {
    // echo 'Connected successfully';
}
