<?php 
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../config/Database.php';
  include_once '../models/Time.php';

  $database = new Database();
  $db = $database->connect();
  $time = new Time($db);
  $result = $time->read();
  $num = $result->rowCount();
  
  if($num > 0) {
    $flight_arr = array();
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
      $flight_item = array(
        'id' => $id,
        'aircraft' => $aircraft,
        'aircraft_regno' => $aircraft_regno,
        'take_off' => $take_off,
        'landing' => $landing,
        'status' => $status
      );
      array_push($flight_arr, $flight_item);
    }
    echo json_encode($flight_arr);
  } else {
    echo json_encode(
      array('message' => 'No Flights Found')
    );
  }