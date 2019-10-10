<?php 
  class Aircraft {
    private $conn;
    private $table_aircraft = 'aircraft';

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
      $query = 'INSERT INTO ' . $this->table_aircraft . ' SET name = :name, code = :code, reg_no = :reg_no, model = :model';
      $stmt = $this->conn->prepare($query);

      $this->name = htmlspecialchars(strip_tags($this->name));
      $this->code = htmlspecialchars(strip_tags($this->code));
      $this->reg_no = htmlspecialchars(strip_tags($this->reg_no));
      $this->model = htmlspecialchars(strip_tags($this->model));

      $stmt->bindParam(':name', $this->name);
      $stmt->bindParam(':code', $this->code);
      $stmt->bindParam(':reg_no', $this->reg_no);
      $stmt->bindParam(':model', $this->model);

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
      $query = 'UPDATE ' . $this->table_aircraft . ' SET name = :name, code = :code, reg_no = :reg_no, model = :model WHERE id = :id';
      $stmt = $this->conn->prepare($query);

      $this->id = htmlspecialchars(strip_tags($this->id));
      $this->name = htmlspecialchars(strip_tags($this->name));
      $this->code = htmlspecialchars(strip_tags($this->code));
      $this->reg_no = htmlspecialchars(strip_tags($this->reg_no));
      $this->model = htmlspecialchars(strip_tags($this->model));

      $stmt->bindParam(':id', $this->id);
      $stmt->bindParam(':name', $this->name);
      $stmt->bindParam(':code', $this->code);
      $stmt->bindParam(':reg_no', $this->reg_no);
      $stmt->bindParam(':model', $this->model);

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

    // GET api/aircraft/read_sort
    public function read_sort() {
      $query = 'SELECT * FROM ' . $this->table_aircraft . ' WHERE code = :code';
      $stmt = $this->conn->prepare($query);

      $this->code = htmlspecialchars(strip_tags($this->code));

      $stmt->bindParam(':code', $this->code);

      if($stmt->execute()) {
        return $stmt;
      }
    }
  }