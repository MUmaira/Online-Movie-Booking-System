<?php 
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $dbName = "online movie booking system";

    $connection = new mysqli($serverName,$userName,$password,$dbName);

    if($connection->connect_error){
        die("Error " .$connection->connect_error);
    }
?>