<?php
// database configuration for safe-assist
$dbhost = '127.0.0.1';
$dbuser = 'root';
$dbpass = 'abc123';
$dbname = 'safeassist';

$dbconn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) 
  or die('unable to connect to DB');
  
session_start();

?>
