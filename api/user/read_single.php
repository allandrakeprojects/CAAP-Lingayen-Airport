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
  $result = $user->read_single();
  $num = $result->rowCount();
  
  if($num > 0) {
    $users_arr = array();
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
      $user_item = array(
        'id' => $id,
        'full_name' => $full_name,
        'contact_number' => $contact_number,
        'address' => $address,
        'email' => $email,
        'status' => ($status == '1') ? 'Active' : 'Inactive',
      );
      array_push($users_arr, $user_item);
    }
    echo json_encode($users_arr);
  } else {
    echo json_encode(
      array('message' => 'No Users Found')
    );
  }