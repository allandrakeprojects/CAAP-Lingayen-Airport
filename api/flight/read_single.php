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
  $flight->id = $data->id;
  $result = $flight->read_single();
  $num = $result->rowCount();
  
  if($num > 0) {
    $flight_arr = array();
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
      $flight_item = array(
        'id' => $id,
        'airline_name' => $airline_name,
        'classification' => $classification,
        'landing' => $landing,
        'take_off' => $take_off,
        'parking' => $parking,
        'nature' => $nature,
        'flight_no' => $flight_no,
        'origin' => $origin,
        'destination' => $destination,
        'type' => $type,
        'reg_no' => $reg_no,
        'owner' => $owner,
        'arrival' => $arrival,
        'non_revenue' => $non_revenue,
        'dead_head' => $dead_head,
        'transit' => $transit,
        'gc_unloaded' => $gc_unloaded,
        'gc_loaded' => $gc_loaded,
        'am_unloaded' => $am_unloaded,
        'am_loaded' => $am_loaded,
        'license_no' => $license_no,
        'date_created' => $date_created,
      );
      array_push($flight_arr, $flight_item);
    }
    echo json_encode($flight_arr);
  } else {
    echo json_encode(
      array('message' => 'No Flight Found')
    );
  }