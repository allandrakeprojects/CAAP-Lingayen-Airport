<?php 
  class User {
    private $conn;
    private $table_user = 'user';

    public $id;
    public $full_name;
    public $contact_number;
    public $address;
    public $email;
    public $password;
    public $status;
    public $type;
    
    public function __construct($db) {
      $this->conn = $db;
    }

    // POST api/user/create
    public function create() {
      $query = 'INSERT INTO ' . $this->table_user . ' SET full_name = :full_name, contact_number = :contact_number, address = :address, email = :email, password = :password, status = :status';
      $stmt = $this->conn->prepare($query);

      $this->full_name = htmlspecialchars(strip_tags($this->full_name));
      $this->contact_number = htmlspecialchars(strip_tags($this->contact_number));
      $this->address = htmlspecialchars(strip_tags($this->address));
      $this->email = htmlspecialchars(strip_tags($this->email));
      $this->password = htmlspecialchars(strip_tags($this->password));
      $this->status = htmlspecialchars(strip_tags($this->status));
      
      $stmt->bindParam(':full_name', $this->full_name);
      $stmt->bindParam(':contact_number', $this->contact_number);
      $stmt->bindParam(':address', $this->address);
      $stmt->bindParam(':email', $this->email);
      $stmt->bindParam(':password', $this->password);
      $stmt->bindParam(':status', $this->status);

      if($stmt->execute()) {
        return true;
      }
    }

    // GET api/user/read
    public function read() {
      $query = 'SELECT * FROM ' . $this->table_user . ' WHERE type = 1';
      $stmt = $this->conn->prepare($query);
      $stmt->execute();
      return $stmt;
    }

    // GET api/user/read_single
    public function read_single() {
      $query = 'SELECT * FROM ' . $this->table_user . ' WHERE id = :id';
      $stmt = $this->conn->prepare($query);

      $this->id = htmlspecialchars(strip_tags($this->id));

      $stmt->bindParam(':id', $this->id);

      if($stmt->execute()) {
        return $stmt;
      }
    }

    // PUT api/user/update
    public function update() {
      $query = 'UPDATE ' . $this->table_user . ' SET full_name = :full_name, contact_number = :contact_number, address = :address, email = :email, password = :password, status = :status WHERE id = :id';
      $stmt = $this->conn->prepare($query);

      $this->id = htmlspecialchars(strip_tags($this->id));
      $this->full_name = htmlspecialchars(strip_tags($this->full_name));
      $this->contact_number = htmlspecialchars(strip_tags($this->contact_number));
      $this->address = htmlspecialchars(strip_tags($this->address));
      $this->email = htmlspecialchars(strip_tags($this->email));
      $this->password = htmlspecialchars(strip_tags($this->password));
      $this->status = htmlspecialchars(strip_tags($this->status));
      
      $stmt->bindParam(':id', $this->id);
      $stmt->bindParam(':full_name', $this->full_name);
      $stmt->bindParam(':contact_number', $this->contact_number);
      $stmt->bindParam(':address', $this->address);
      $stmt->bindParam(':email', $this->email);
      $stmt->bindParam(':password', $this->password);
      $stmt->bindParam(':status', $this->status);

      if($stmt->execute()) {
        return true;
      }
    }

    // POST api/user/delete
    public function delete() {
      $query = 'DELETE FROM ' . $this->table_user . ' WHERE id = :id';
      $stmt = $this->conn->prepare($query);

      $this->id = htmlspecialchars(strip_tags($this->id));

      $stmt->bindParam(':id', $this->id);

      if($stmt->execute()) {
        return true;
      }
    }

    // POST api/user/login
    public function login() {
      $query = 'SELECT * FROM ' . $this->table_user . ' WHERE email = ? LIMIT 0,1';
      $stmt = $this->conn->prepare($query);
      $stmt->bindParam(1, $this->email);
      $password = $this->password;
      $stmt->execute();
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      $passwordHash = $row['password'];

      if(password_verify($password, $passwordHash)){
        if($row['status'] == 1){
          session_start();
          $_SESSION['id'] = $row['id'];
          $_SESSION['full_name'] = $row['full_name'];
          $_SESSION['email'] = $row['email'];
          $_SESSION['type'] = $row['type'];
          $this->type = $row['type'];
          $this->status = 'success';
        } else {
          $this->status = 'inactive';
        }
      } else {
        $this->status = 'failed';
      }

      return $stmt;
    }
  }