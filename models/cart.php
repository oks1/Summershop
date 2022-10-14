<?php

class Cart{
private $conn;
private $table = 'cart';

// Cart Properties
public $id;
public $user_id;
public $product_id;
public $qty;
public $status;

// Constructor with DB
public function __construct($db) {
    $this->conn = $db;
  }

 
    //create Post

    public function create(){

        $query = 'INSERT INTO ' . 
        $this->table . ' SET user_id = :user_id, 
                         product_id = :product_id, 
                         qty = 1,
                        status = "Added to cart"';

// Prepare statement
            $stmt = $this->conn->prepare($query);

            // Clean data
            $this->user_id = htmlspecialchars(strip_tags($this->user_id));
            $this->product_id = htmlspecialchars(strip_tags($this->product_id));
            // $this->qty = htmlspecialchars(strip_tags($this->qty));
            // $this->status = htmlspecialchars(strip_tags($this->status));

            // Bind data
           
            $stmt->bindParam(':user_id', $this->user_id);
            $stmt->bindParam(':product_id', $this->product_id);
            // $stmt->bindParam(':qty', $this->qty);
            // $stmt->bindParam(':status', $this->status);

            // Execute query
            if($stmt->execute()) {
            return true;
            }
            // Print error if something goes wrong
            printf("Error: %s.\n", $stmt->error);

            return false;
    }

    public function getCart(){
    // Create query
    $r=$_SESSION['id'];
    // $query = 'SELECT f.user_id, f.product_id, p.id, p.name, p.description, u.id
    // FROM' . $this->table . ' f
    // JOIN products p ON f.product_id=p.id
    // JOIN users as u on f.user_id = u.id
    // WHERE f.user_id = ' . $r . ' ';
    $query = 'SELECT c.user_id, c.product_id, c.qty, p.id, p.name, p.price, u.id, 0 as subtotal
    FROM cart as c 
    JOIN products as p on c.product_id = p.id
    JOIN users as u on c.user_id = u.id
    WHERE c.user_id = ' . $r . '';



    // Prepare statement
    $stmt = $this->conn->prepare($query); //PDO

    // Execute query
    $stmt->execute();

    return $stmt;
    }


    public function deleteCart()
  {
    $query = 'DELETE FROM cart WHERE product_id =:id and user_id = '.$_SESSION['id'].' ';
    // Prepare statement
    $stmt = $this->conn->prepare($query);

    $this->productID = htmlspecialchars(strip_tags($this->productID)); //has this one extra

    $stmt->bindParam(':id', $this->productID);

    if ($stmt->execute()) {
      return true;
    }
    return false;
  }



public function addQty($id){
  // Create query
  $query = 'UPDATE ' . $this->table . '
  SET qty = (SELECT qty+1 FROM `cart` WHERE product_id ='.$id.' and user_id = '.$_SESSION['id'].')
  WHERE product_id ='.$id.' and user_id = '.$_SESSION['id'].'';
  // WHERE id = '.$id.'';

  // Prepare statement
  $stmt = $this->conn->prepare($query);

  // Clean data
  
  
  // $this->qty = htmlspecialchars(strip_tags($this->qty));
  // $this->address = htmlspecialchars(strip_tags($this->address));
  // $this->phone = htmlspecialchars(strip_tags($this->phone));
  //$this->userStatus = htmlspecialchars(strip_tags($this->userStatus));
  $this->product_id = htmlspecialchars(strip_tags($this->product_id));

  // Bind data
  // $stmt->bindParam(':qty', $this->qty);
  //$stmt->bindParam(':email', $this->email);
  // $stmt->bindParam(':password', $this->password);
  // $stmt->bindParam(':address', $this->address);
  // $stmt->bindParam(':phone', $this->phone);
  // //$stmt->bindParam(':status', $this->userStatus);
  $stmt->bindParam(':product_id', $this->product_id);
echo $query;
  // Execute query
  if ($stmt->execute()) {

    return true;
  }

}

public function removeQty($id){
  // Create query
  $query = 'UPDATE ' . $this->table . '
  SET qty = (SELECT qty-1 FROM `cart` WHERE product_id ='.$id.' and user_id = '.$_SESSION['id'].')
  WHERE product_id ='.$id.' and user_id = '.$_SESSION['id'].'
  and qty>1';
  // WHERE id = '.$id.'';

  // Prepare statement
  $stmt = $this->conn->prepare($query);

  // Clean data
  
  
  // $this->qty = htmlspecialchars(strip_tags($this->qty));
  // $this->address = htmlspecialchars(strip_tags($this->address));
  // $this->phone = htmlspecialchars(strip_tags($this->phone));
  //$this->userStatus = htmlspecialchars(strip_tags($this->userStatus));
  $this->product_id = htmlspecialchars(strip_tags($this->product_id));

  // Bind data
  // $stmt->bindParam(':qty', $this->qty);
  //$stmt->bindParam(':email', $this->email);
  // $stmt->bindParam(':password', $this->password);
  // $stmt->bindParam(':address', $this->address);
  // $stmt->bindParam(':phone', $this->phone);
  // //$stmt->bindParam(':status', $this->userStatus);
  $stmt->bindParam(':product_id', $this->product_id);
echo $query;
  // Execute query
  if ($stmt->execute()) {

    return true;
  }

}

}


?>