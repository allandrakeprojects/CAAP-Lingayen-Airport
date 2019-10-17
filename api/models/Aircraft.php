<?php
  class Aircraft {
    private $conn;
    private $table_aircraft = 'aircraft';
    public $table_aircraft_time = 'time';

    public $id;
    public $name;
    public $code;
    public $reg_no;
    public $model;
    
    public function __construct($db) {
      $this->conn = $db;
    }

    // POST api/aircraft/create
    public function create() {
      $query = 'INSERT INTO ' . $this->table_aircraft . ' SET name = :name, code = :code, reg_no = :reg_no, model = :model, pilot = :pilot';
      $stmt = $this->conn->prepare($query);

      $this->name = htmlspecialchars(strip_tags($this->name));
      $this->code = htmlspecialchars(strip_tags($this->code));
      $this->reg_no = htmlspecialchars(strip_tags($this->reg_no));
      $this->model = htmlspecialchars(strip_tags($this->model));
      $this->pilot = htmlspecialchars(strip_tags($this->pilot));

      $stmt->bindParam(':name', $this->name);
      $stmt->bindParam(':code', $this->code);
      $stmt->bindParam(':reg_no', $this->reg_no);
      $stmt->bindParam(':model', $this->model);
      $stmt->bindParam(':pilot', $this->pilot);

      if($stmt->execute()) {
        return true;
      }
    }

    // GET api/aircraft/read
    public function read() {
      $query = 'SELECT * FROM ' . $this->table_aircraft;
      $stmt = $this->conn->prepare($query);
      $stmt->execute();
      return $stmt;
    }

    // GET api/aircraft/read_single
    public function read_single() {
      $query = 'SELECT * FROM ' . $this->table_aircraft . ' WHERE id = :id';
      $stmt = $this->conn->prepare($query);

      $this->id = htmlspecialchars(strip_tags($this->id));

      $stmt->bindParam(':id', $this->id);

      if($stmt->execute()) {
        return $stmt;
      }
    }

    // PUT api/aircraft/update
    public function update() {
      $query = 'UPDATE ' . $this->table_aircraft . ' SET name = :name, code = :code, reg_no = :reg_no, model = :model, pilot = :pilot WHERE id = :id';
      $stmt = $this->conn->prepare($query);

      $this->id = htmlspecialchars(strip_tags($this->id));
      $this->name = htmlspecialchars(strip_tags($this->name));
      $this->code = htmlspecialchars(strip_tags($this->code));
      $this->reg_no = htmlspecialchars(strip_tags($this->reg_no));
      $this->model = htmlspecialchars(strip_tags($this->model));
      $this->pilot = htmlspecialchars(strip_tags($this->pilot));

      $stmt->bindParam(':id', $this->id);
      $stmt->bindParam(':name', $this->name);
      $stmt->bindParam(':code', $this->code);
      $stmt->bindParam(':reg_no', $this->reg_no);
      $stmt->bindParam(':model', $this->model);
      $stmt->bindParam(':pilot', $this->pilot);

      if($stmt->execute()) {
        return true;
      }
    }

    // POST api/aircraft/delete
    public function delete() {
      $query = 'DELETE FROM ' . $this->table_aircraft . ' WHERE id = :id';
      $stmt = $this->conn->prepare($query);

      $this->id = htmlspecialchars(strip_tags($this->id));

      $stmt->bindParam(':id', $this->id);

      if($stmt->execute()) {
        return true;
      }
    }

    // POST api/aircraft/time
    public function time() {
      $query = 'INSERT INTO ' . $this->table_aircraft_time . ' SET aircraft = :aircraft, status = :status';
      $stmt = $this->conn->prepare($query);

      $this->aircraft = htmlspecialchars(strip_tags($this->aircraft));
      $this->status = htmlspecialchars(strip_tags($this->status));

      $stmt->bindParam(':aircraft', $this->aircraft);
      $stmt->bindParam(':status', $this->status);

      if($stmt->execute()) {
        return true;
      }
    }
  }