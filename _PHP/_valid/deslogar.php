<?php
  session_start();
  session_unset(); 
  session_destroy();
  header('location: ../../_HTML/_valid/login.php'); 
?>