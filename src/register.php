<?php
require_once('dbconfig.php');
session_start();
?>
<form action="process_registration.php" method="POST">
  <div class="<?= $_SESSION['passworderror'] ? 'formfielderror' : 'formfield'?>">
    <span class="formfieldname">Username (your email address): </span>
    <input type="text" name="username" value=""/> 
    <?php if($_SESSION['usernameerror'] == 'exists') { ?> 
    <span class="errormessage">The specified email address has an existing account. </span>
    <?php } else if($_SESSION['usernameerror'] == 'invalid') { ?> 
    <span class="errormessage">Invalid email address given for username. </span>
    <?php } ?>
  </div> 
  <div class="<?= $_SESSION['passworderror'] ? 'formfielderror' : 'formfield'?>">
    <span class="formfieldname">Password: </span>
    <input type="text" name="pw1" value=""/> 
    <?php if($_SESSION['passworderror']) { ?> 
    <span class="errormessage">Password invalid or did not match. </span>
    <?php } ?>
  </div> 
  <div class="<?= $_SESSION['passworderror'] ? 'formfielderror' : 'formfield'?>">
    <span class="formfieldname">Password (repeat): </span>
    <input type="text" name="pw2" value=""/> 
    <?php if($_SESSION['passworderror']) { ?> 
    <span class="errormessage">Password invalid or did not match. </span>
    <?php } ?>
  </div> 
  <input type="submit" name="createuser" value="Submit Registration">
</form>
<?php
unset($_SESSION['passworderror']);
unset($_SESSION['usernameerror']);
?>
