<?php 
  class Schedule {
    private $conn;
    private $table = 'schedule';
    
    public function __construct($db) {
      $this->conn = $db;
    }

    // POST api/schedule/create
    public function create() {
      $query = 'INSERT INTO ' . $this->table . ' SET aircraft = :aircraft, time = :time, student = :student, nationality = :nationality, instructor = :instructor, route = :route, under_maintenance = :under_maintenance, date_created = :date_created';
      $stmt = $this->conn->prepare($query);

      $this->aircraft = htmlspecialchars(strip_tags($this->aircraft));
      $this->time = htmlspecialchars(strip_tags($this->time));
      $this->student = htmlspecialchars(strip_tags($this->student));
      $this->nationality = htmlspecialchars(strip_tags($this->nationality));
      $this->instructor = htmlspecialchars(strip_tags($this->instructor));
      $this->route = htmlspecialchars(strip_tags($this->route));
      $this->under_maintenance = htmlspecialchars(strip_tags($this->under_maintenance));
      $this->date_created = htmlspecialchars(strip_tags($this->date_created));
      
      $stmt->bindParam(':aircraft', $this->aircraft);
      $stmt->bindParam(':time', $this->time);
      $stmt->bindParam(':student', $this->student);
      $stmt->bindParam(':nationality', $this->nationality);
      $stmt->bindParam(':instructor', $this->instructor);
      $stmt->bindParam(':route', $this->route);
      $stmt->bindParam(':under_maintenance', $this->under_maintenance);
      $stmt->bindParam(':date_created', $this->date_created);

      if($stmt->execute()) {
        return true;
      }
    }

    // GET api/schedule/read
    public function read() {
      $query = 'SELECT * FROM ' . $this->table;
      $stmt = $this->conn->prepare($query);
      $stmt->execute();
      return $stmt;
    }

    // GET api/schedule/read_single
    public function read_single() {
      $query = 'SELECT * FROM ' . $this->table . ' WHERE id = :id';
      $stmt = $this->conn->prepare($query);

      $this->id = htmlspecialchars(strip_tags($this->id));

      $stmt->bindParam(':id', $this->id);

      if($stmt->execute()) {
        return $stmt;
      }
    }

    // PUT api/schedule/update
    public function update() {
      $query = 'UPDATE ' . $this->table . ' SET aircraft = :aircraft, time = :time, student = :student, nationality = :nationality, instructor = :instructor, route = :route, under_maintenance = :under_maintenance WHERE id = :id';
      $stmt = $this->conn->prepare($query);

      $this->id = htmlspecialchars(strip_tags($this->id));
      $this->aircraft = htmlspecialchars(strip_tags($this->aircraft));
      $this->time = htmlspecialchars(strip_tags($this->time));
      $this->student = htmlspecialchars(strip_tags($this->student));
      $this->nationality = htmlspecialchars(strip_tags($this->nationality));
      $this->instructor = htmlspecialchars(strip_tags($this->instructor));
      $this->route = htmlspecialchars(strip_tags($this->route));
      $this->under_maintenance = htmlspecialchars(strip_tags($this->under_maintenance));
      
      $stmt->bindParam(':id', $this->id);
      $stmt->bindParam(':aircraft', $this->aircraft);
      $stmt->bindParam(':time', $this->time);
      $stmt->bindParam(':student', $this->student);
      $stmt->bindParam(':nationality', $this->nationality);
      $stmt->bindParam(':instructor', $this->instructor);
      $stmt->bindParam(':route', $this->route);
      $stmt->bindParam(':under_maintenance', $this->under_maintenance);

      if($stmt->execute()) {
        return true;
      }
    }

    // POST api/schedule/delete
    public function delete() {
      $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';
      $stmt = $this->conn->prepare($query);

      $this->id = htmlspecialchars(strip_tags($this->id));

      $stmt->bindParam(':id', $this->id);

      if($stmt->execute()) {
        return true;
      }
    }

    // GET api/schedule/read_single_pilot
    public function read_single_pilot() {
      $query = 'SELECT * FROM ' . $this->table . ' WHERE student = :pilot';
      $stmt = $this->conn->prepare($query);

      $this->pilot = htmlspecialchars(strip_tags($this->pilot));

      $stmt->bindParam(':pilot', $this->pilot);

      if($stmt->execute()) {
        return $stmt;
      }
    }
  }