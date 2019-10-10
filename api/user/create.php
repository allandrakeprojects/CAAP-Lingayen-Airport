<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../config/Database.php';
  include_once '../models/User.php';

  $database = new Database();
  $db = $database->connect();

  $user = new User($db);

  $data = json_decode(file_get_contents("php://input"));
  $user->full_name = $data->full_name;
  $user->contact_number = $data->contact_number;
  $user->address = $data->address;
  $user->email = $data->email;
  if($data->status == 'Active'){
    $user->status = '1';
  } else {
    $user->status = '0';
  }
  
  $hash = password_hash($data->password, PASSWORD_BCRYPT);
  $user->password = $hash;

  if($user->create()) {
    echo json_encode(
      array('status' => 'ok')
    );
  } else {
    echo json_encode(
      array('status' => 'failed')
    );
  }