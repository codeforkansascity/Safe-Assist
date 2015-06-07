<?php
//process new registration
require_once("dbconfig.php");
session_start();

//validate password
if($_POST['pw1'] != $_POST['pw2']) { //passwords don't match
  $_SESSION['passworderror'] = 'no match';
}

//insure new registration
if($dbconn->query("SELECT * FROM USER WHERE Username = '"
	. addslashes($_POST['username']) . "'")->num_rows) {
  $_SESSION['usernameerror'] = 'exists';
}

//validate username
$email = filter_var($_POST['username'], FILTER_VALIDATE_EMAIL);
if(!$email) {
  $_SESSION['usernameerror'] = 'invalid';
}

if($_SESSION['usernameerror'] || $_SESSION['passworderror']) {
  header('Location: register.php'); die;
}

// registration info validated, add user account
// TODO: update to work with temporary registration table and force email validation
$sql = "INSERT INTO USER (Username, Password, Usertype) VALUES('" . addslashes($_POST['username']) . 
       "', MD5('". addslashes($_POST['pw1'])."'), 'NORMAL')";
if(!$dbconn->query($sql)) { // TODO: internal error
	echo $sql;
}
$_SESSION['newregistration'] = 'yes';

header('Location: index.php'); die;
?>
