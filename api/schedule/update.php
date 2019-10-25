<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../config/Database.php';
  include_once '../models/Schedule.php';

  $database = new Database();
  $db = $database->connect();

  $schedule = new Schedule($db);

  $data = json_decode(file_get_contents("php://input"));
  $schedule->id = $data->id;
  $schedule->aircraft = $data->aircraft;
  $schedule->time = $data->time;
  $schedule->student = $data->student;
  $schedule->nationality = $data->nationality;
  $schedule->instructor = $data->instructor;
  $schedule->route = $data->route;

  if($schedule->update()) {
    echo json_encode(
      array('status' => 'ok')
    );
  } else {
    echo json_encode(
      array('status' => 'failed')
    );
  }