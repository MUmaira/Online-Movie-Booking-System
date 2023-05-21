<?php
//configuration file
require 'config.php';


//determining whether the user has submitted the form
if (isset($_POST["submitBtn"])) {

    //validating and sanitizing user inputs
    $fname = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_SPECIAL_CHARS);
    $lname = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_SPECIAL_CHARS);
    $dob = filter_input(INPUT_POST, 'dob', FILTER_SANITIZE_SPECIAL_CHARS);
    $NIC = filter_input(INPUT_POST, 'NIC', FILTER_SANITIZE_SPECIAL_CHARS);
    $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_SPECIAL_CHARS);
    $phoneNum = filter_input(INPUT_POST, 'phoneNumber', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

    //hashing the password (if a hacker gets in to db, she/he will see all the passwords)
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    //sql query to insert data into Customer table in the database
    $sql = "INSERT INTO Customer (C_fname, C_lname, C_NIC, C_DOB, C_address, C_contact, C_email) VALUES ('$fname', '$lname', '$NIC', '$dob', '$address', $phoneNum, '$email' )";

    //sql query to insert data into UserAccount table in database
    $sqlUser = "INSERT INTO UserAccount (U_type, U_password, U_email, U_contact) VALUES ('Customer', '$hashedPassword', '$email', $phoneNum)";

    //perform the queries and check if its success or not
    if ($connection->query($sql) and $connection->query($sqlUser)) {
        echo "<script>console.log('Inserted successfully')</script>";
    } else { //if failed
        echo "<script>console.log('ERROR')</script>";
    }
}

//redirect the user to login page after successful registration
header('Location: login.php');


//close the connection
$connection->close();
