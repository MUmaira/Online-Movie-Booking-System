<!--  IT21260988 - Randeniya R. A. D. S. E  -->

<?php
session_start();
include 'config.php';

//initialize global variable to a local variable
$UID = $_SESSION['uid'];

/*-------------------------------------- For updating user information -------------------------------------------------*/

//determining whether the user has submitted the form to update the user's information
if (isset($_POST['updateProfile'])) {

    //sanitizing and validating the user inputs
    $newFname = filter_input(INPUT_POST, 'newFname', FILTER_SANITIZE_SPECIAL_CHARS);
    $newLname = filter_input(INPUT_POST, 'newLname', FILTER_SANITIZE_SPECIAL_CHARS);
    $newAddress = filter_input(INPUT_POST, 'newAddress', FILTER_SANITIZE_SPECIAL_CHARS);
    $newDob = filter_input(INPUT_POST, 'newDob', FILTER_SANITIZE_SPECIAL_CHARS);
    $newEmail = filter_input(INPUT_POST, 'newEmail', FILTER_SANITIZE_SPECIAL_CHARS);
    $newPhoneNum = filter_input(INPUT_POST, 'newPhoneNum', FILTER_SANITIZE_SPECIAL_CHARS);

    //sql query to update the Customer table in the database
    $sql = "UPDATE Customer SET C_fname='$newFname', C_lname='$newLname', C_DOB='$newDob', C_address='$newAddress', C_contact='$newPhoneNum', C_email='$newEmail'  WHERE CID = $UID";

    //sql query to update the UserAccount table in the databse
    $sqlUA = "UPDATE UserAccount SET U_email='$newEmail' WHERE UID = $UID";

    //perform the queries and check if its success or not
    if ($connection->query($sql) === TRUE) {
        //if successfull redirect user to the user dashboard
        header('Location: UserDashboard.php');
    } else {
        echo "Error";
    }
    //perform the queries and check if its success or not
    if ($connection->query($sqlUA) === TRUE) {
        echo "Success";
    } else {
        echo "Error";
    }
}

/*-------------------------------------- For changing user password -------------------------------------------------*/

//determining whether the user has submitted the form to change the password
if (isset($_POST['changePassword'])) {

    //sanitizing and validating the user inputs
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
    $newPassword = filter_input(INPUT_POST, 'newPassword', FILTER_SANITIZE_SPECIAL_CHARS);
    $confirmNewPassword = filter_input(INPUT_POST, 'confirmPassword', FILTER_SANITIZE_SPECIAL_CHARS);

    //sql query to get the user's current password from the UserAccount table in the database
    $sqlCurrentPwd = "SELECT * FROM UserAccount WHERE UID = '$UID'";

    //perform the query
    $result = $connection->query($sqlCurrentPwd);

    //check there is a result row
    if ($result->num_rows > 0) {

        //fetch the result row as an associative array
        while ($row = $result->fetch_assoc()) {

            //checking if the user entered password is same as the password in the database
            $pwdCheck = password_verify($password, $row["U_password"]);

            //check if the user entered current password is equal to the password in the database
            if ($pwdCheck == true) {

                //hashing the new password
                $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                //Update the password in the UserAccount to the new password entered by the user
                $sql = "UPDATE UserAccount SET U_password='$hashedPassword' WHERE UID=$UID";

                //perform the query and check if its successfull
                if ($connection->query($sql) === TRUE) {
                    //if successfull redirect user to the user dashboard
                    header('Location: UserDashboard.php');
                } else {
                    echo "error";
                }
            } else {
                header('Location: UpdateProfile.php?error=incorrectPwd');
            }
        }
    }
}


/*-------------------------------------- For updating user information -------------------------------------------------*/

//determining whether the user has submitted the form to delete user's profile
if (isset($_POST['deleteProfile'])) {

    //sql queries to delete the user's information from both Customer and UserAccount table
    $sql = "DELETE FROM Customer WHERE CID = '$UID'";
    $sqlUA = "DELETE FROM UserAccount WHERE UID = '$UID'";

    //perform the queries and check if its successful
    if ($connection->query($sql) === TRUE) {
        //redirect user to registration page
        header('Location: UserRegistration.php');
    } else {
        echo "error";
    }
    if ($connection->query($sqlUA) === TRUE) {
        //redirect user to registration page
        header('Location: UserRegistration.php');
    } else {
        echo "error";
    }
}


//close the connection
$connection->close();
