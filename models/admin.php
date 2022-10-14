<?php
class Admin
{
  // DB stuff
  private $conn;
  private $table = 'admin';
  private $tableUser = 'users';
  private $tableProduct = 'products';

  // Properties
  public $id;
  public $name;
  public $password;
  public $email;

  public $userID;
  public $userName;
  public $userEmail;
  public $userPassword;
  public $userAddress;
  public $userPhone;
  public $userStatus;

  public $productID;
  public $productName;
  public $productDescription;
  public $productPrice;


  // Constructor with DB
  public function __construct($db)
  {
    $this->conn = $db;
  }

  // Login Post
  public function login()
  {
    // Create query
    $query = 'SELECT name, password From ' . $this->table . ' WHERE name = :name AND password = :password';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Bind data
    $stmt->bindParam(':name', $this->name);
    $stmt->bindParam(':password', $this->password);

    // Execute query
    $stmt->execute();

    // Return value
    return $stmt;
  }

  // Get All Users Post
  public function getAll()
  {
    // Create query
    $query = 'SELECT * FROM users  ORDER BY
      id ASC';

    // Prepare statement
    $stmt = $this->conn->prepare($query); //PDO

    // Execute query
    $stmt->execute();

    return $stmt;
  }

  // Get a user
  public function getById($id)
  {
    // Create query
    $query = 'SELECT * FROM users WHERE id = ' . $id . ' ORDER BY
      id ASC';

    // Prepare statement
    $stmt = $this->conn->prepare($query); //PDO

    // Execute query
    $stmt->execute();

    return $stmt;
  }

  public function delete()
  {
    $query = 'DELETE FROM users WHERE id =:id';
    // Prepare statement
    $stmt = $this->conn->prepare($query);

    $this->userID = htmlspecialchars(strip_tags($this->userID)); //has this one extra

    $stmt->bindParam(':id', $this->userID);

    if ($stmt->execute()) {
      return true;
    }
    return false;
  }

  public function update()
  {
    // Create query
    $query = 'UPDATE ' . $this->tableUser . '
    SET name = :name, email = :email, password = :password, 
    address = :address, phone = :phone, status = :status
    WHERE id = :id';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->userName = htmlspecialchars(strip_tags($this->userName));
    $this->userEmail = htmlspecialchars(strip_tags($this->userEmail));
    $this->userPassword = htmlspecialchars(strip_tags($this->userPassword));
    $this->userAddress = htmlspecialchars(strip_tags($this->userAddress));
    $this->userPhone = htmlspecialchars(strip_tags($this->userPhone));
    $this->userStatus = htmlspecialchars(strip_tags($this->userStatus));
    $this->userID = htmlspecialchars(strip_tags($this->userID));

    // Bind data
    $stmt->bindParam(':name', $this->userName);
    $stmt->bindParam(':email', $this->userEmail);
    $stmt->bindParam(':password', $this->userPassword);
    $stmt->bindParam(':address', $this->userAddress);
    $stmt->bindParam(':phone', $this->userPhone);
    $stmt->bindParam(':status', $this->userStatus);
    $stmt->bindParam(':id', $this->userID);

    // Execute query
    if ($stmt->execute()) {

      return true;
    }

    // Print error if something goes wrong
    printf("Error: %s.\n", $stmt->error);

    return false;
  }

  public function activeBlock()
  {

    // Create query
    $query = 'UPDATE ' . $this->tableUser . '
    SET status = :status
    WHERE id = :id';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->userID = htmlspecialchars(strip_tags($this->userID));
    $this->userStatus = htmlspecialchars(strip_tags($this->userStatus));

    // Bind data
    $stmt->bindParam(':status', $this->userStatus);
    $stmt->bindParam(':id', $this->userID);

    // Execute query
    if ($stmt->execute()) {

      return true;
    }

    // Print error if something goes wrong
    printf("Error: %s.\n", $stmt->error);

    return false;
  }


  // for product function

  public function getAllProducts()
  {
    // Create query
    $query = 'SELECT * FROM products  ORDER BY
      id ASC';

    // Prepare statement
    $stmt = $this->conn->prepare($query); //PDO

    // Execute query
    $stmt->execute();

    return $stmt;
  }

  // Get product by ID
  public function getProductById($id)
  {
    // Create query
    $query = 'SELECT * FROM products WHERE id = ' . $id . ' ORDER BY
      id ASC';

    // Prepare statement
    $stmt = $this->conn->prepare($query); //PDO

    // Execute query
    $stmt->execute();

    return $stmt;
  }

  public function deleteProduct()
  {
    $query = 'DELETE FROM products WHERE id =:id';
    // Prepare statement
    $stmt = $this->conn->prepare($query);

    $this->productID = htmlspecialchars(strip_tags($this->productID)); //has this one extra

    $stmt->bindParam(':id', $this->productID);

    if ($stmt->execute()) {
      return true;
    }
    return false;
  }

  public function updateProduct()
  {
    // Create query
    $query = 'UPDATE ' . $this->tableProduct . '
    SET name = :name, price = :price, description = :description
    WHERE id = :id';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->productName = htmlspecialchars(strip_tags($this->productName));
    $this->productDescription = htmlspecialchars(strip_tags($this->productDescription));
    $this->productPrice = htmlspecialchars(strip_tags($this->productPrice));
    $this->productID = htmlspecialchars(strip_tags($this->productID));

    // Bind data
    $stmt->bindParam(':name', $this->productName);
    $stmt->bindParam(':price', $this->productPrice);
    $stmt->bindParam(':description', $this->productDescription);
    $stmt->bindParam(':id', $this->productID);

    // Execute query
    if ($stmt->execute()) {

      return true;
    }

    // Print error if something goes wrong
    printf("Error: %s.\n", $stmt->error);

    return false;
  }

  public function createProduct()
  {
    // Create query
    $query = 'INSERT INTO ' . $this->tableProduct . '
    (name, price, description)
    VALUES (:name, :price, :description)';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->productName = htmlspecialchars(strip_tags($this->productName));
    $this->productDescription = htmlspecialchars(strip_tags($this->productDescription));
    $this->productPrice = htmlspecialchars(strip_tags($this->productPrice));
    $this->productID = htmlspecialchars(strip_tags($this->productID));

    // Bind data
    $stmt->bindParam(':name', $this->productName);
    $stmt->bindParam(':price', $this->productPrice);
    $stmt->bindParam(':description', $this->productDescription);

    // Execute query
    if ($stmt->execute()) {

      return true;
    }

    // Print error if something goes wrong
    printf("Error: %s.\n", $stmt->error);

    return false;
  }
}// end class