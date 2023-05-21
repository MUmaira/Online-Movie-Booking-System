<!--  IT21260988 - Randeniya R. A. D. S. E  -->

<?php
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link for stylesheet -->
    <link rel="stylesheet" href="../css/UpdateProfile.css">
    <link rel="stylesheet" href="../css/header_navbar.css" />
    <title>Update Profile</title>
</head>

<body>

    <!-------------------------------------------------------------------------------------------------------------------------------->

     <!--Header-->
    <header class="header">
        <div class="header__top">
            <div class="header__top-logo">
                <a href="#"><img src="../images/logo.jpg" alt="logo" /></a>
            </div>

            <div class="header__top-user">
                <a href="reserve-seat.php">Buy tickets</a>
                <i class="fa fa-user"></i>
            </div>

            <div class="header__top-menuopen">
                <i class="fa-solid fa-bars"></i>
            </div>
        </div>

        <nav class="header__nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="movies.php">Movies</a></li>
            <li><a href="aboutUs.php">About Us</a></li>
            <li><a href="../html/ContactUs.html">Contact Us</a></li>
            <div class="header__nav-closemenu">
                <i class="fa-solid fa-xmark"></i>
            </div>
        </nav>
    </header>

    <!-------------------------------------------------------------------------------------------------------------------------------->

    <!-- Form to update the profile -->
    <h1 class="heading">Update Profile</h1>
    <div class="form-container">
        <form action="ManageUpdates.php" method="POST">

            <!-- To update the user information -->
            <div class="update-info">
                <label for="">Change First Name:</label><br>
                <input type="text" name="newFname"><br>
                <label for="">Change Last Name:</label><br>
                <input type="text" name="newLname"><br>
                <label for="">Change Address:</label><br>
                <input type="text" name="newAddress"><br>
                <label for="">Change Date of Birth:</label><br>
                <input type="text" name="newDob"><br>
                <label for="">Change Email:</label><br>
                <input type="text" name="newEmail"><br>
                <label for="">Change Phone Number:</label><br>
                <input type="text" name="newPhoneNum"><br>
                <input class="updateProfileBtn" type="submit" name="updateProfile" value="Update Information"><br>
            </div>

            <!-- To change the user password -->
            <div class="change-password">
                <label for="">Current Password:</label><br>
                <input class="password" type="text" name="password"><br>
            <?php
            //check if the global variable is set
            if(isset($_GET['error']) and $_GET['error'] = 'incorrectPwd'){
                
                $error = 'Incorrect Passowrd';
                echo "<p class='error'>$error</p>";
            }
            ?>
                <label for="">New Password:</label><br>
                <input class="newPassword" type="text" name="newPassword"><br>
                <label for="">Confirm Password</label><br>
                <input class="confirmPassword" type="text" name="confirmPassword"><br>
                <input class="changePasswordBtn" type="submit" name="changePassword" value="Change Password"><br>
            </div>

            <!-- To delete the profile -->
            <div class="delete-profile">
                <p class="danger-txt">Are you sure you want to delete this account? Once you delete you can't recover the account...</p>
                <input class="deleteProfileBtn" type="submit" name="deleteProfile" value="Delete Profile"><br>
            </div>
        </form>
    </div>

    <!-------------------------------------------------------------------------------------------------------------------------------->
    <!--Footer-->
    <footer class="footer">
        <div class="footer__content">
            <div class="footer__content-company">
                <h3>Our Company</h3>
                <ul>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Privacy Policies</a></li>
                </ul>
            </div>

            <div class="footer__content-support">
                <h3>Help and Support</h3>
                <ul>
                    <li><a href="../html/ContactUs.html" target="_blank">Contact Us</a></li>
                    <li><a href="html/faq.html">FAQ</a></li>
                </ul>
            </div>

            <div class="footer__content-social">
                <div>
                    <a href="feedback.php">Feedback</a>
                </div>
                <div>
                    <i class="fa-brands fa-facebook"></i>
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-brands fa-twitter"></i>
                </div>
            </div>
        </div>

        <div class="footer__logo">
            <div></div>
            <img src="../images/logo.jpg" alt="logo" />
            <div></div>
        </div>

        <div class="footer__copyright">
            <p>
                Copyright 2022
                <span><i class="fa-solid fa-copyright"></i></span> QuickBook.com All
                Rights Reserved.
            </p>
        </div>
    </footer>


    <!-- Links for js -->
    <script src="../js/UpdatePasswordValidation.js"></script>
    <script src="../js/index.js"></script>
</body>

</html>