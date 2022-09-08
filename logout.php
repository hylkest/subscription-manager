

<?php
// Destroy loggedin session and send to login.php
session_start();
session_unset();
session_destroy();

header("location:login.php");
exit();
?>