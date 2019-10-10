<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../config/Database.php';
  include_once '../models/Aircraft.php';

  $database = new Database();
  $db = $database->connect();

  $aircraf = new Aircraft($db);
  $data = json_decode(file_get_contents("php://input"));
  $aircraf->id = $data->id;
  $result = $aircraf->read_single();
  $num = $result->rowCount();
  
  if($num > 0) {
    $aircraf_arr = array();
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
      $aircraf_item = array(
        'id' => $id,
        'name' => $name,
        'code' => $code,
        'reg_no' => $reg_no,
        'model' => $model
      );
      array_push($aircraf_arr, $aircraf_item);
    }
    echo json_encode($aircraf_arr);
  } else {
    echo json_encode(
      array('message' => 'No Aircraft Found')
    );
  }