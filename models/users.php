<?php
class Users
{
  // DB stuff
  private $conn;
  private $table = 'users';
  
  public $id;
  public $name;
  public $email;
  public $password;
  public $address;
  public $phone;
//   public $status;


  // Constructor with DB
  public function __construct($db)
  {
    $this->conn = $db;
  }

  public function validEmail(){
   
    $query = 'SELECT email From ' . $this->table . ' WHERE email = :email and status = "unblocked"';
     
     $stmt = $this->conn->prepare($query);
 
     $this->email = htmlspecialchars(strip_tags($this->email));
 
     $stmt->bindParam(':email', $this->email);
 
     $stmt->execute();
 
 // Return value
 return $stmt;
 }


public function signup(){

        $query = 'INSERT INTO ' . 
        $this->table . ' SET name = :name, 
                         email = :email, 
                         password = :password,
                        address = :address,
                        phone = :phone,
                        status = "unblocked"';

// Prepare statement
            $stmt = $this->conn->prepare($query);

            // Clean data
            $this->name = htmlspecialchars(strip_tags($this->name));
            $this->email = htmlspecialchars(strip_tags($this->email));
            $this->password = htmlspecialchars(strip_tags($this->password));
            $this->address = htmlspecialchars(strip_tags($this->address));
            $this->phone = htmlspecialchars(strip_tags($this->phone));
            // $this->status = htmlspecialchars(strip_tags($this->status));

            // Bind data
           
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':password', $this->password);
            $stmt->bindParam(':address', $this->address);
            $stmt->bindParam(':phone', $this->phone);
            // $stmt->bindParam(':status', $this->status);

            // Execute query
            if($stmt->execute()) {
            return true;
            }

            // Print error if something goes wrong
            printf("Error: %s.\n", $stmt->error);

            return false;
    }


    public function login(){
// Create query
$query = 'SELECT id, email, password From ' . $this->table . ' WHERE email = :email AND password = :password and status = "unblocked"';

// Prepare statement
$stmt = $this->conn->prepare($query);

// Bind data
$stmt->bindParam(':email', $this->email);
$stmt->bindParam(':password', $this->password);

// Execute query
$stmt->execute();

// Return value
return $stmt;
}


  // Get a user
  public function getByUser($email)
  {
    // Create query
    $query = 'SELECT * FROM users WHERE email = ' . '"'. $email.'"';


    //echo     $query;

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



public function update()
{
  // Create query
  $query = 'UPDATE ' . $this->table . '
  SET name = :name,  password = :password, 
  address = :address, phone = :phone
  WHERE id = :id';

  // Prepare statement
  $stmt = $this->conn->prepare($query);

  // Clean data
  $this->name = htmlspecialchars(strip_tags($this->name));
  //$this->email = htmlspecialchars(strip_tags($this->email));
  $this->email = $_SESSION['email'];
  $this->password = htmlspecialchars(strip_tags($this->password));
  $this->address = htmlspecialchars(strip_tags($this->address));
  $this->phone = htmlspecialchars(strip_tags($this->phone));
  //$this->userStatus = htmlspecialchars(strip_tags($this->userStatus));
  $this->id = htmlspecialchars(strip_tags($this->id));

  // Bind data
  $stmt->bindParam(':name', $this->name);
  //$stmt->bindParam(':email', $this->email);
  $stmt->bindParam(':password', $this->password);
  $stmt->bindParam(':address', $this->address);
  $stmt->bindParam(':phone', $this->phone);
  //$stmt->bindParam(':status', $this->userStatus);
  $stmt->bindParam(':id', $this->id);

  // Execute query
  if ($stmt->execute()) {

    return true;
  }

  // Print error if something goes wrong
  printf("Error: %s.\n", $stmt->error);

  return false;
}


}// end class

