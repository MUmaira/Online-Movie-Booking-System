<!--  IT21260988 - Randeniya R. A. D. S. E  -->
<?php
session_start();
require 'config.php';

//determining whether the user has submitted the form 
if (isset($_POST['loginBtn'])) {

    //validating and sanitizing the user inputs
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

    //sql query to select all information of the user from UserAccount table with email equal to the user input email
    $sql = "SELECT * FROM UserAccount WHERE U_email = '$email'";

    //perform the query
    $result = $connection->query($sql);

    //check if there is a result row
    if ($result->num_rows > 0) {

        //fetch the result row as an associative array
        while ($row = $result->fetch_assoc()) {

            //checking if the user entered password is same as the password in the database
            $pwdCheck = password_verify($password, $row["U_password"]);

            //check if the user input password is same as the password in the database
            if ($pwdCheck == true) {

                //session variables to use if the login is success
                $_SESSION['uid'] = $row['UID'];
                $_SESSION['email'] = $email;
                $_SESSION['phoneNum'] = $row['U_contact'];

                //redirect user to the dashboard
                header('Location: UserDashboard.php');
                exit();
            } else { //if password or email invalid
                header('Location: login.php?error=invalidEmailorPassword');
                exit();
            }
        }
    } else { //if fields are empty
        header('Location: login.php?error=empty');
    }
} elseif (isset($_POST['registerBtn'])) {
    header('Location: UserRegistration.php');
}

//close the connection
$connection->close();
