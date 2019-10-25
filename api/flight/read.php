<?php 
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../config/Database.php';
  include_once '../models/Flight.php';

  $database = new Database();
  $db = $database->connect();
  $flight = new Flight($db);
  $result = $flight->read();
  $num = $result->rowCount();
  
  if($num > 0) {
    $flight_arr = array();
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
      $flight_item = array(
        'id' => $id,
        'airline_name' => $airline_name,
        'classification' => $classification,
        'landing' => date("g:i:s a", strtotime($landing)),
        'take_off' => date("g:i:s a", strtotime($take_off)),
        'total_hrs' => $total_hrs,
        'pilot' => $pilot,
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
        'date_created' =>  date("F j, Y", strtotime(str_replace(' 00:00:00', '', $date_created))),
      );
      array_push($flight_arr, $flight_item);
    }
    echo json_encode($flight_arr);
  } else {
    echo json_encode(
      array('message' => 'No Flights Found')
    );
  }