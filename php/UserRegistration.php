<!-- IT21260988 - Randeniya R. A. D. S. E -->


<?php
//configuration file
require 'config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link for Fontasewome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Link for stylesheet -->
    <link rel="stylesheet" href="../css/UserRegistration.css">
    <link rel="stylesheet" href="../css/header_navbar.css" />
    <title>Registration Page</title>
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

    <!-- Registration form -->
    <div class="heading">
        <h2>REGISTER NOW</h2>
    </div>
    <div class="form-container">
        <form method="POST" class="form" action="InsertCustomerDetails.php">

            <!--Taking user details. Required attribute is added to make sure guest user fills all fields in the form-->
            <label for="">First Name: <span>*</span> </label> <br>
            <input type="text" class="firstName" name="firstName" placeholder="First Name" required maxlength="10" > <br>
            <label for="">Last Name: <span>*</span> </label><br>
            <input type="text" class="lastName" name="lastName" placeholder="Last Name" maxlength="10" required ><br>
            <label for="">Date of Birth: <span>*</span> </label><br>
            <input type="text" class="dob" name="dob" placeholder="YY-MM-DD" required ><br>
            <label for="">NIC: <span>*</span> </label><br>
            <input type="text" class="NIC" name="NIC" placeholder="NIC" required maxlength="10" ><br>
            <label for="">Address: <span>*</span> </label><br>
            <input type="text" class="address" name="address" placeholder="Address" required maxlength="60" ><br>
            <label for="">Contact Number: <span>*</span> </label><br>
            <input type="text" class="phoneNumber" name="phoneNumber" placeholder="Phone Number" required ><br>
            <label for="">Email: <span>*</span> </label><br>
            <input type="email" class="email" name="email" id="email" placeholder="Email Address" required ><br>
            <label for="">Password: <span>*</span> </label><br>
            <input type="password" class="password" name="password" id="" placeholder="Password" minlength="8" maxlength="10" required><br>
            <label for="">Confirm Password: <span>*</span> </label><br>
            <input type="password" class="confirmPassword" name="confirmPassword" id="" placeholder="Confirm Password" minlength="8" maxlength="10" required><br>
            <div class="agreeTC">
                <input type="checkbox" class="checkbox" name="agreeTC" id="" required>I hearby agree to the Terms and conditions

            </div>
            <div class="submit">
                <a href="test.php"><input type="submit" name="submitBtn" class="submitBtn" value="Register" id=""></a>
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


    <!-------------------------------------------------------------------------------------------------------------------------------->

    <!-- Links for js files -->
    <script src="../js/UserRegistrationValidation.js"></script>
    <script src="../js/index.js"></script>
</body>

</html>