<?php
  session_start();

  if(!isset($_SESSION['full_name'])){
    header("Location: /pages/login.php");
    die();
  } else {
    header("Location: /pages/flight_plans.php");
  }
?>
