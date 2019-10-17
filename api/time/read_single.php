<?php
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../config/Database.php';
  include_once '../models/Time.php';

  $database = new Database();
  $db = $database->connect();

  $time = new Time($db);
  $data = json_decode(file_get_contents("php://input"));
  $time->aircraft = $data->aircraft;
  $result = $time->read_single();
  $num = $result->rowCount();
  
  if($num > 0) {
    $time_arr = array();
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
      $time_item = array(
        'aircraft' => $aircraft,
        'aircraft_regno' => $aircraft_regno,
        'take_off' => $take_off,
        'landing' => $landing,
        'status' => $status,
        'pilot' => $pilot,
      );
      array_push($time_arr, $time_item);
    }
    echo json_encode($time_arr);
  } else {
    echo json_encode(
      array('message' => 'No Time Found')
    );
  }