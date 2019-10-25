<?php 
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../config/Database.php';
  include_once '../models/Flight.php';

  $database = new Database();
  $db = $database->connect();
  $flight = new Flight($db);
  $result = $flight->total_flight_hr();
  $num = $result->rowCount();
  
  if($num > 0) {
    $flight_arr = array();
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
      $flight_item = array(
        'pilot' => $pilot,
        'total_hrs' => $total_hrs,
        'left_hrs' => $left_hrs,
        'payment' => $payment,
      );
      array_push($flight_arr, $flight_item);
    }
    echo json_encode($flight_arr);
  } else {
    echo json_encode(
      array('message' => 'No Flights Found')
    );
  }