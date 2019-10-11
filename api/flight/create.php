<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../config/Database.php';
  include_once '../models/Flight.php';

  $database = new Database();
  $db = $database->connect();

  $flight = new Flight($db);

  $data = json_decode(file_get_contents("php://input"));
  $flight->airline_name = $data->airline_name;
  $flight->classification = $data->classification;
  $flight->landing = $data->landing;
  $flight->take_off = $data->take_off;
  $flight->parking = $data->parking;
  $flight->nature = $data->nature;
  $flight->flight_no = $data->flight_no;
  $flight->origin = $data->origin;
  $flight->destination = $data->destination;
  $flight->type = $data->type;
  $flight->reg_no = $data->reg_no;
  $flight->owner = $data->owner;
  $flight->arrival = $data->arrival;
  $flight->non_revenue = $data->non_revenue;
  $flight->dead_head = $data->dead_head;
  $flight->transit = $data->transit;
  $flight->gc_unloaded = $data->gc_unloaded;
  $flight->gc_loaded = $data->gc_loaded;
  $flight->am_unloaded = $data->am_unloaded;
  $flight->am_loaded = $data->am_loaded;
  $flight->license_no = $data->license_no;
  $flight->date_created = date("Y-m-d");

  if($flight->create()) {
    echo json_encode(
      array('status' => 'ok')
    );
  } else {
    echo json_encode(
      array('status' => 'failed')
    );
  }