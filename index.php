<?php
  session_start();

  if(!isset($_SESSION['full_name'])){
    header("Location: http://caaplingayenairport.ezyro.com/pages/login.php");
    die();
  } else {
    header("Location: http://caaplingayenairport.ezyro.com/pages/index.php");
  }
?>