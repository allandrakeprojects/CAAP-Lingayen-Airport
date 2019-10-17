<?php 
  class Flight {
    private $conn;
    private $table_flight = 'flight';

    public $airline_name;
    public $classification;
    public $landing;
    public $take_off;
    public $parking;
    public $nature;
    public $flight_no;
    public $origin;
    public $destination;
    public $type;
    public $reg_no;
    public $owner;
    public $arrival;
    public $non_revenue;
    public $dead_head;
    public $transit;
    public $gc_unloaded;
    public $gc_loaded;
    public $am_unloaded;
    public $am_loaded;
    public $license_no;
    public $date_created;
    
    public function __construct($db) {
      $this->conn = $db;
    }

    // POST api/flight/create
    public function create() {
      $query = 'INSERT INTO ' . $this->table_flight . ' SET airline_name = :airline_name, classification = :classification, landing = :landing, take_off = :take_off, total_hrs = :total_hrs, pilot = :pilot, parking = :parking,
      nature = :nature, flight_no = :flight_no, origin = :origin, destination = :destination, type = :type, reg_no = :reg_no, owner = :owner, arrival = :arrival, non_revenue = :non_revenue, dead_head = :dead_head, transit = :transit,
      gc_unloaded = :gc_unloaded, gc_loaded = :gc_loaded, am_unloaded = :am_unloaded, am_loaded = :am_loaded, license_no = :license_no, date_created = :date_created';
      $stmt = $this->conn->prepare($query);

      $this->airline_name = htmlspecialchars(strip_tags($this->airline_name));
      $this->classification = htmlspecialchars(strip_tags($this->classification));
      $this->landing = htmlspecialchars(strip_tags($this->landing));
      $this->take_off = htmlspecialchars(strip_tags($this->take_off));
      $this->total_hrs = htmlspecialchars(strip_tags($this->total_hrs));
      $this->pilot = htmlspecialchars(strip_tags($this->pilot));
      $this->parking = htmlspecialchars(strip_tags($this->parking));
      $this->nature = htmlspecialchars(strip_tags($this->nature));
      $this->flight_no = htmlspecialchars(strip_tags($this->flight_no));
      $this->origin = htmlspecialchars(strip_tags($this->origin));
      $this->destination = htmlspecialchars(strip_tags($this->destination));
      $this->type = htmlspecialchars(strip_tags($this->type));
      $this->reg_no = htmlspecialchars(strip_tags($this->reg_no));
      $this->owner = htmlspecialchars(strip_tags($this->owner));
      $this->arrival = htmlspecialchars(strip_tags($this->arrival));
      $this->non_revenue = htmlspecialchars(strip_tags($this->non_revenue));
      $this->dead_head = htmlspecialchars(strip_tags($this->dead_head));
      $this->transit = htmlspecialchars(strip_tags($this->transit));
      $this->gc_unloaded = htmlspecialchars(strip_tags($this->gc_unloaded));
      $this->gc_loaded = htmlspecialchars(strip_tags($this->gc_loaded));
      $this->am_unloaded = htmlspecialchars(strip_tags($this->am_unloaded));
      $this->am_loaded = htmlspecialchars(strip_tags($this->am_loaded));
      $this->license_no = htmlspecialchars(strip_tags($this->license_no));
      $this->date_created = htmlspecialchars(strip_tags($this->date_created));
      
      $stmt->bindParam(':airline_name', $this->airline_name);
      $stmt->bindParam(':classification', $this->classification);
      $stmt->bindParam(':landing', $this->landing);
      $stmt->bindParam(':take_off', $this->take_off);
      $stmt->bindParam(':total_hrs', $this->total_hrs);
      $stmt->bindParam(':pilot', $this->pilot);
      $stmt->bindParam(':parking', $this->parking);
      $stmt->bindParam(':nature', $this->nature);
      $stmt->bindParam(':flight_no', $this->flight_no);
      $stmt->bindParam(':origin', $this->origin);
      $stmt->bindParam(':destination', $this->destination);
      $stmt->bindParam(':type', $this->type);
      $stmt->bindParam(':reg_no', $this->reg_no);
      $stmt->bindParam(':owner', $this->owner);
      $stmt->bindParam(':arrival', $this->arrival);
      $stmt->bindParam(':non_revenue', $this->non_revenue);
      $stmt->bindParam(':dead_head', $this->dead_head);
      $stmt->bindParam(':transit', $this->transit);
      $stmt->bindParam(':gc_unloaded', $this->gc_unloaded);
      $stmt->bindParam(':gc_loaded', $this->gc_loaded);
      $stmt->bindParam(':am_unloaded', $this->am_unloaded);
      $stmt->bindParam(':am_loaded', $this->am_loaded);
      $stmt->bindParam(':license_no', $this->license_no);
      $stmt->bindParam(':date_created', $this->date_created);

      if($stmt->execute()) {
        return true;
      }
    }

    // GET api/flight/read
    public function read() {
      $query = 'SELECT * FROM ' . $this->table_flight;
      $stmt = $this->conn->prepare($query);
      $stmt->execute();
      return $stmt;
    }

    // GET api/flight/read_single
    public function read_single() {
      $query = 'SELECT * FROM ' . $this->table_flight . ' WHERE id = :id';
      $stmt = $this->conn->prepare($query);

      $this->id = htmlspecialchars(strip_tags($this->id));

      $stmt->bindParam(':id', $this->id);

      if($stmt->execute()) {
        return $stmt;
      }
    }

    // api/flight/custom_read
    public function custom_read() {
      $query = 'SELECT * FROM ' . $this->table_flight . ' WHERE pilot = :pilot';
      $stmt = $this->conn->prepare($query);

      $this->pilot = htmlspecialchars(strip_tags($this->pilot));

      $stmt->bindParam(':pilot', $this->pilot);

      if($stmt->execute()) {
        return $stmt;
      }
    }

    // PUT api/flight/update
    public function update() {
      $query = 'UPDATE ' . $this->table_flight . ' SET airline_name = :airline_name, classification = :classification, landing = :landing, take_off = :take_off, total_hrs = :total_hrs, pilot = :pilot, parking = :parking,
      nature = :nature, flight_no = :flight_no, origin = :origin, destination = :destination, type = :type, reg_no = :reg_no, owner = :owner, arrival = :arrival, non_revenue = :non_revenue, dead_head = :dead_head, transit = :transit,
      gc_unloaded = :gc_unloaded, gc_loaded = :gc_loaded, am_unloaded = :am_unloaded, am_loaded = :am_loaded, license_no = :license_no WHERE id = :id';
      $stmt = $this->conn->prepare($query);

      $this->id = htmlspecialchars(strip_tags($this->id));
      $this->airline_name = htmlspecialchars(strip_tags($this->airline_name));
      $this->classification = htmlspecialchars(strip_tags($this->classification));
      $this->landing = htmlspecialchars(strip_tags($this->landing));
      $this->take_off = htmlspecialchars(strip_tags($this->take_off));
      $this->total_hrs = htmlspecialchars(strip_tags($this->total_hrs));
      $this->pilot = htmlspecialchars(strip_tags($this->pilot));
      $this->parking = htmlspecialchars(strip_tags($this->parking));
      $this->nature = htmlspecialchars(strip_tags($this->nature));
      $this->flight_no = htmlspecialchars(strip_tags($this->flight_no));
      $this->origin = htmlspecialchars(strip_tags($this->origin));
      $this->destination = htmlspecialchars(strip_tags($this->destination));
      $this->type = htmlspecialchars(strip_tags($this->type));
      $this->reg_no = htmlspecialchars(strip_tags($this->reg_no));
      $this->owner = htmlspecialchars(strip_tags($this->owner));
      $this->arrival = htmlspecialchars(strip_tags($this->arrival));
      $this->non_revenue = htmlspecialchars(strip_tags($this->non_revenue));
      $this->dead_head = htmlspecialchars(strip_tags($this->dead_head));
      $this->transit = htmlspecialchars(strip_tags($this->transit));
      $this->gc_unloaded = htmlspecialchars(strip_tags($this->gc_unloaded));
      $this->gc_loaded = htmlspecialchars(strip_tags($this->gc_loaded));
      $this->am_unloaded = htmlspecialchars(strip_tags($this->am_unloaded));
      $this->am_loaded = htmlspecialchars(strip_tags($this->am_loaded));
      $this->license_no = htmlspecialchars(strip_tags($this->license_no));
      
      $stmt->bindParam(':id', $this->id);
      $stmt->bindParam(':airline_name', $this->airline_name);
      $stmt->bindParam(':classification', $this->classification);
      $stmt->bindParam(':landing', $this->landing);
      $stmt->bindParam(':take_off', $this->take_off);
      $stmt->bindParam(':total_hrs', $this->total_hrs);
      $stmt->bindParam(':pilot', $this->pilot);
      $stmt->bindParam(':parking', $this->parking);
      $stmt->bindParam(':nature', $this->nature);
      $stmt->bindParam(':flight_no', $this->flight_no);
      $stmt->bindParam(':origin', $this->origin);
      $stmt->bindParam(':destination', $this->destination);
      $stmt->bindParam(':type', $this->type);
      $stmt->bindParam(':reg_no', $this->reg_no);
      $stmt->bindParam(':owner', $this->owner);
      $stmt->bindParam(':arrival', $this->arrival);
      $stmt->bindParam(':non_revenue', $this->non_revenue);
      $stmt->bindParam(':dead_head', $this->dead_head);
      $stmt->bindParam(':transit', $this->transit);
      $stmt->bindParam(':gc_unloaded', $this->gc_unloaded);
      $stmt->bindParam(':gc_loaded', $this->gc_loaded);
      $stmt->bindParam(':am_unloaded', $this->am_unloaded);
      $stmt->bindParam(':am_loaded', $this->am_loaded);
      $stmt->bindParam(':license_no', $this->license_no);

      if($stmt->execute()) {
        return true;
      }
    }

    // POST api/flight/delete
    public function delete() {
      $query = 'DELETE FROM ' . $this->table_flight . ' WHERE id = :id';
      $stmt = $this->conn->prepare($query);

      $this->id = htmlspecialchars(strip_tags($this->id));

      $stmt->bindParam(':id', $this->id);

      if($stmt->execute()) {
        return true;
      }
    }
  }