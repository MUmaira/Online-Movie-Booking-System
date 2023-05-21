<?php 
    //adding the database connection
    require "config.php";

    $email = $_GET['email'];

    $sql = "DELETE FROM fdata WHERE email = '$email'";
    $result = mysqli_query($connection,$sql);

    if($result){
        echo "Item removed successfully";
    }else {
        echo "Error" .$connection->error;
    }

    header("Location:feedback.php");
?>