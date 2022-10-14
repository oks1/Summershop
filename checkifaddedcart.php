<?php
function check_if_added_to_cart($product_id){
     require 'connection.php';

    $userid = $_SESSION['id'];
    $result = "SELECT * FROM cart where product_id='$product_id' and user_id='$userid' 
               and status='Added to cart'";
    // $test = mysqli_query($conn, $result);
    // if(mysqli_num_rows($test)>=1){
    //     return 1;
    // }else{
    // return 0;
    // }
    $test = mysqli_query($conn,$result);
    if(mysqli_num_rows($test)>=1){
        return 1;
        echo "test";
    }else{
    return 0;
    }
}


?>