<?php 
  // Headers
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
  $time->status = $data->status;

  if($time->create()) {
    echo json_encode(
      array('status' => 'ok')
    );
  } else {
    echo json_encode(
      array('status' => 'failed')
    );
  }