<?php 
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../config/Database.php';
  include_once '../models/User.php';

  $database = new Database();
  $db = $database->connect();
  $user = new User($db);
  $result = $user->read();
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
        'status' => ($status == '1') ? '<label class="badge badge-success">Active</label>' : '<label class="badge badge-danger">Inactive</label>',
      );
      array_push($users_arr, $user_item);
    }
    echo json_encode($users_arr);
  } else {
    echo json_encode(
      array('message' => 'No Users Found')
    );
  }