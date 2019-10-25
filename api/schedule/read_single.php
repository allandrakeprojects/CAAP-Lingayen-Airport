<?php
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
  $result = $schedule->read_single();
  $num = $result->rowCount();
  
  if($num > 0) {
    $schedule_arr = array();
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
      $schedule_item = array(
        'id' => $id,
        'aircraft' => $aircraft,
        'time' => $time,
        'student' => $student,
        'nationality' => $nationality,
        'instructor' => $instructor,
        'route' => $route
      );
      array_push($schedule_arr, $schedule_item);
    }
    echo json_encode($schedule_arr);
  } else {
    echo json_encode(
      array('message' => 'No Schedule Found')
    );
  }