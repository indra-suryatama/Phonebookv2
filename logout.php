<?php
	ob_start();
  session_start();

  echo "Logout Successfully ";
  session_destroy();   // function that Destroys Session 
  header("Location: login.php");
?>