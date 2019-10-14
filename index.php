<?php
  session_start();

  if(!isset($_SESSION['full_name'])){
    header("Location: /CAAP%20Lingayen%20Airport/pages/login.php");
    die();
  } else {
    header("Location: /CAAP%20Lingayen%20Airport/pages/flight_plans.php");
  }
?>
