<?php
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../config/Database.php';
  include_once '../models/Flight.php';

  $database = new Database();
  $db = $database->connect();

  $flight = new Flight($db);
  $data = json_decode(file_get_contents("php://input"));
  $flight->pilot = $data->pilot;
  $result = $flight->read_single_total_flight_hr();
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
      array('message' => 'No Flight Found')
    );
  }