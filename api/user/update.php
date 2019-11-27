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
  $user->id = $data->id;
  $user->first_name = $data->first_name;
  $user->middle_initial = $data->middle_initial;
  $user->last_name = $data->last_name;
  $user->contact_number = $data->contact_number;
  $user->address = $data->address;
  $user->city = $data->city;
  $user->province = $data->province;
  $user->email = $data->email;
  if($data->status == 'Active'){
    $user->status = '1';
  } else {
    $user->status = '0';
  }
  
  $hash = password_hash($data->password, PASSWORD_BCRYPT);
  $user->password = $hash;

  if($user->update()) {
    echo json_encode(
      array('status' => 'ok')
    );
  } else {
    echo json_encode(
      array('status' => 'failed')
    );
  }