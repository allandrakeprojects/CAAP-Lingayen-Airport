<?php 
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../config/Database.php';
  include_once '../models/Schedule.php';

  $database = new Database();
  $db = $database->connect();
  $schedule = new Schedule($db);
  $result = $schedule->read();
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
        'route' => $route,
        'under_maintenance' => ($under_maintenance == 0) ? 'No' : 'Yes',
        'date_created' => $date_created,
      );
      array_push($schedule_arr, $schedule_item);
    }
    echo json_encode($schedule_arr);
  } else {
    echo json_encode(
      array('message' => 'No Schedules Found')
    );
  }