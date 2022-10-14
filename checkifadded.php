<?php

// session_start();
function check_if_added_to_favorites($product_id){
    require "connection.php";

    $user_id = $_SESSION['id'];
    $result = 'SELECT * FROM favorites WHERE product_id ='.$product_id.' and user_id = '.$user_id.' ';

//     $stmt = $this->conn->prepare($query);

//     $this->productID = htmlspecialchars(strip_tags($this->productID)); //has this one extra

//     $stmt->bindParam(':id', $this->productID);

//     if ($stmt->execute()) {
//       return true;
//     }
//     return false;
//   }

    // $result = "SELECT * FROM favorites where product_id='$product_id' and user_id='$user_id'";
    $test = mysqli_query($conn,$result);
    if(mysqli_num_rows($test)>=1){
        return 1;
        echo "test";
    }else{
    return 0;
    }
}


?>