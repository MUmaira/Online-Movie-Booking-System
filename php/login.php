<!--  IT21260988 - Randeniya R. A. D. S. E  -->

<?php
require 'config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!--Links for stylesheets-->
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/header_navbar.css" />
    <title>Log in</title>
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
            <li><a href="about us page.php">About Us</a></li>
            <li><a href="../html/ContactUs.html">Contact Us</a></li>
            <div class="header__nav-closemenu">
                <i class="fa-solid fa-xmark"></i>
            </div>
        </nav>
    </header>
    <!-------------------------------------------------------------------------------------------------------------------------------->

    <!-- Form to login to the user account -->
    <div class="form-container">

        <form class="form" method="POST" action="checkLoginDetails.php">
            <img class="userAvatar" src="../images/userIcon.png" alt="">
            <h2>Welcome Back</h2>

            <?php
            //check if the email id invalid
            if (isset($_GET['error']) && $_GET['error'] == 'invalidEmailorPassword') {
                echo "<p class='errorMsg'>Invalid Email/Password</p><br>";
            }
            //check if there are empty fields
            if (isset($_GET['error']) && $_GET['error'] == 'empty') {
                echo "<p class='errorMsg'>Please Enter Email and Password</p><br>";
            }
            ?>
            <input class="email" type="text" name="email" placeholder="Email Address"><br>
            <input class="email" type="password" name="password" placeholder="Password"><br>
            <input class="loginBtn" type="submit" name="loginBtn" value="Log in"><br>
            <p class="text">Don't have an Account yet? <br> Then register for New One...</p>
            <button class="register" name="registerBtn">Register</button>
        </form>
    </div>

    <!-------------------------------------------------------------------------------------------------------------------------------->

    <!--Footer-->
    <footer class="footer">
        <div class="footer__content">
            <div class="footer__content-company">
                <h3>Our Company</h3>
                <ul>
                    <li><a href="about us page.php">About Us</a></li>
                    <li><a href="T&CandPrivacypolicies.php">Privacy Policies</a></li>
                </ul>
            </div>

            <div class="footer__content-support">
                <h3>Help and Support</h3>
                <ul>
                    <li><a href="../html/ContactUs.html" target="_blank">Contact Us</a></li>
                    <li><a href="../html/faq.html">FAQ</a></li>
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

    <script src="../js/index.js"></script>
</body>

</html>