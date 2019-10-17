<?php
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../config/Database.php';
  include_once '../models/Aircraft.php';

  $database = new Database();
  $db = $database->connect();
  $user = new Aircraft($db);
  $result = $user->read();
  $num = $result->rowCount();
  
  if($num > 0) {
    $aircraft_arr = array();
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
      $user_item = array(
        'id' => $id,
        'name' => $name,
        'code' => $code,
        'reg_no' => $reg_no,
        'model' => $model,
        'pilot' => $pilot
      );
      array_push($aircraft_arr, $user_item);
    }
    echo json_encode($aircraft_arr);
  } else {
    echo json_encode(
      array('message' => 'No Aircrafts Found')
    );
  }