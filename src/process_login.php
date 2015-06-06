<?php
// processes a login attempt and redirects
require_once("dbconfig.php");
session_start();
if($_POST['logout']) {  //process logout
  unset($_SESSION['username']);
  unset($_SESSION['userid']);
} else {  // process login
  $sql = "SELECT * FROM USER WHERE Username = '" . 
     addslashes($_POST['username']) . "' AND Password = MD5('" . 
     addslashes($_POST['password']) . "')";
  $res = $dbconn->query($sql);

  if(!$res) { //TODO: internal error
    die("internal error: malformed SQL: $sql");
  } else {
    $row = $res->fetch_assoc();
    if(!$row) { //TODO: failed authentication
      $_SESSION['loginerror'] = 'failed authentication';
    } else { // valid login
      $_SESSION['userid'] = $row['id'];
      $_SESSION['username'] = $row['username'];
    } 
  }
}

header('Location: index.php');
die;
?>
