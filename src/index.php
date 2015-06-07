<?php
require_once('dbconfig.php');
require_once('loginheader.php');

if($_SESSION['newregistration']) {
?><div class="message">Your new registration was successful. Please check your email to confirm your new account</div>
<?php
  unset($_SESSION['newregistration']);
}
?>
