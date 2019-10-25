<?php
  class Time {
    private $conn;
    private $table_time = 'time';
    
    public function __construct($db) {
      $this->conn = $db;
    }

    // POST api/time/create
    public function create() {
      $query = 'INSERT INTO ' . $this->table_time . ' SET aircraft = :aircraft, aircraft_regno = :aircraft_regno, pilot = :pilot, status = :status';
      $stmt = $this->conn->prepare($query);

      $this->aircraft = htmlspecialchars(strip_tags($this->aircraft));
      $this->aircraft_regno = htmlspecialchars(strip_tags($this->aircraft_regno));
      $this->pilot = htmlspecialchars(strip_tags($this->pilot));
      $this->status = htmlspecialchars(strip_tags($this->status));

      $stmt->bindParam(':aircraft', $this->aircraft);
      $stmt->bindParam(':aircraft_regno', $this->aircraft_regno);
      $stmt->bindParam(':pilot', $this->pilot);
      $stmt->bindParam(':status', $this->status);

      if($stmt->execute()) {
        return true;
      }
    }

    // GET api/time/read
    public function read() {
      $query = 'SELECT * FROM ' . $this->table_time . ' ORDER BY aircraft';
      $stmt = $this->conn->prepare($query);
      $stmt->execute();
      return $stmt;
    }

    // GET api/time/read_single
    public function read_single() {
      $query = 'SELECT * FROM time';
      $stmt = $this->conn->prepare($query);

      $this->aircraft = htmlspecialchars(strip_tags($this->aircraft));

      $stmt->bindParam(':aircraft', $this->aircraft);

      if($stmt->execute()) {
        return $stmt;
      }
    }

    // PUT api/time/update
    public function update() {
      $query = 'UPDATE ' . $this->table_time . ' SET take_off = :take_off, landing = :landing, status = :status WHERE aircraft = :aircraft AND aircraft_regno = :aircraft_regno';
      $stmt = $this->conn->prepare($query);

      $this->aircraft = htmlspecialchars(strip_tags($this->aircraft));
      $this->aircraft_regno = htmlspecialchars(strip_tags($this->aircraft_regno));
      $this->take_off = htmlspecialchars(strip_tags($this->take_off));
      $this->landing = htmlspecialchars(strip_tags($this->landing));
      $this->status = htmlspecialchars(strip_tags($this->status));

      $stmt->bindParam(':aircraft', $this->aircraft);
      $stmt->bindParam(':aircraft_regno', $this->aircraft_regno);
      $stmt->bindParam(':take_off', $this->take_off);
      $stmt->bindParam(':landing', $this->landing);
      $stmt->bindParam(':status', $this->status);

      if($stmt->execute()) {
        return true;
      }
    }
  }