<?php
require_once("dbconfig.php");

// check for logged-in user
if($_SESSION['userid']) {
  $username = $_SESSION['username'];
?>
  <div class="loggedin">Logged in as <?=$username?>
    <form action="process_login.php" method="POST">
      <input type="submit" name="logout" value="logout"/>
    </form>
  </div>
<?php
} else {
  if(isset($_SESSION['loginerror'])) {
?>
  <div class="errormsg">Error: incorrect or unknown username or password</div>
<?php
    unset($_SESSION['loginerror']);
  }

?>
  <div class="login">
    <form action="process_login.php" method="POST">
      Username: <input type="text" name="username"/>
      Password: <input type="text" name="password"/>
      <input type="submit" value="login"/>
    </form>
    <a href="register.php" alt="create a new account" class="create_account">
      create a new account
    </a>
  </div>
<?php 
}

?>
