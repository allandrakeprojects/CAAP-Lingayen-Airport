<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../config/Database.php';
  include_once '../models/User.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog user object
  $user = new User($db);

  // Get ID
  $data = json_decode(file_get_contents("php://input"));
  $user->email = $data->email;
  $user->password = $data->password;

  // Get user
  $result = $user->login();

  // Create array
  $post_arr = array(
    'status' => $user->status,
    'type' => $user->type,
  );
  // Make JSON

  // Get row count
  $num = $result->rowCount();

  if($num > 0) {
    print_r(json_encode($post_arr));
  } else {
    echo json_encode(
        array('message' => 'Email Not Exists')
    );
  }