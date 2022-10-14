<?php

class favorites{
private $conn;
private $table = 'favorites';

// Favorites Properties
public $id;
public $user_id;
public $product_id;

// Constructor with DB
public function __construct($db) {
    $this->conn = $db;
  }

 
    //create Favorites

    public function create(){

        $query = 'INSERT INTO ' . 
        $this->table . ' SET user_id = :user_id,
                         product_id = :product_id';
                         

// Prepare statement
            $stmt = $this->conn->prepare($query);

            // Clean data
            $this->user_id = htmlspecialchars(strip_tags($this->user_id));
            $this->product_id = htmlspecialchars(strip_tags($this->product_id));

            // Bind data
           
            $stmt->bindParam(':user_id', $this->user_id);
            $stmt->bindParam(':product_id', $this->product_id);

            // Execute query
            if($stmt->execute()) {
            return true;
            }
            // Print error if something goes wrong
            printf("Error: %s.\n", $stmt->error);

            return false;
    }



  public function getFavorites()
  {
    // Create query
    $r=$_SESSION['id'];
    // $query = 'SELECT f.user_id, f.product_id, p.id, p.name, p.description, u.id
    // FROM' . $this->table . ' f
    // JOIN products p ON f.product_id=p.id
    // JOIN users as u on f.user_id = u.id
    // WHERE f.user_id = ' . $r . ' ';
    $query = 'SELECT f.user_id, f.product_id, p.id, p.name, p.description, u.id
    FROM favorites as f 
    JOIN products as p on f.product_id = p.id
    JOIN users as u on f.user_id = u.id
    WHERE f.user_id = ' . $r . '';

    // Prepare statement
    $stmt = $this->conn->prepare($query); //PDO

    // Execute query
    $stmt->execute();

    return $stmt;
    }

    public function deleteFavorites()
  {
    $query = 'DELETE FROM favorites WHERE product_id =:id and user_id = '.$_SESSION['id'].' ';
    // Prepare statement
    $stmt = $this->conn->prepare($query);

    $this->productID = htmlspecialchars(strip_tags($this->productID)); //has this one extra

    $stmt->bindParam(':id', $this->productID);

    if ($stmt->execute()) {
      return true;
    }
    return false;
  }

  function check_if_added_to_favorites($product_id){
    // require "connection.php";

    $user_id = $_SESSION['id'];
    $query = 'SELECT * FROM favorites WHERE product_id =:id and user_id = '.$user_id.' ';

    $stmt = $this->conn->prepare($query);

    $this->productID = htmlspecialchars(strip_tags($this->productID)); //has this one extra

    $stmt->bindParam(':id', $this->productID);

    if ($stmt->execute()) {
      return true;
    }
    return false;
  }


}
?>