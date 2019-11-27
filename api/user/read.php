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
    $user_arr = array();
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
      $user_item = array(
        'id' => $id,
        'first_name' => $first_name,
        'middle_initial' => $middle_initial,
        'last_name' => $last_name,
        'contact_number' => $contact_number,
        'address' => $address,
        'city' => $city,
        'province' => $province,
        'email' => $email,
        'status' => ($status == '1') ? '<label class="badge badge-success">Active</label>' : '<label class="badge badge-danger">Inactive</label>',
      );
      array_push($user_arr, $user_item);
    }
    echo json_encode($user_arr);
  } else {
    echo json_encode(
      array('message' => 'No Users Found')
    );
  }