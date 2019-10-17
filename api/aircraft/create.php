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

  $aircraft = new Aircraft($db);

  $data = json_decode(file_get_contents("php://input"));
  $aircraft->name = $data->name;
  $aircraft->code = $data->code;
  $aircraft->reg_no = $data->reg_no;
  $aircraft->model = $data->model;
  $aircraft->pilot = $data->pilot;

  if($aircraft->create()) {
    echo json_encode(
      array('status' => 'ok')
    );
  } else {
    echo json_encode(
      array('status' => 'failed')
    );
  }