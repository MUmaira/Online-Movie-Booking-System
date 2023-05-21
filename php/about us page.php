<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>About Us Page</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../css/Styles1.css" />
  <script src="../js/index.js" defer></script>

</head>

<body>
  <!--Header-->
  <header class="header">
    <div class="header__top">
      <div class="header__top-logo">
        <a href="#"><img src="../images/logo.jpg" alt="logo" /></a>
      </div>

      <div class="header__top-user">
        <a href="reserve-seat.php">Buy tickets</a>
        <?php
        if (isset($_SESSION['uid'])) {
          echo "<a href='UserDashboard.php'><i class='fa fa-user'></i></a>";
        } else {
          echo "<a href='UserRegistration.php'><i class='fa fa-user'></i></a>";
        }
        ?>
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

  <div class="container"></div>

  <!---header end------------------------>




  <!--body-->


  <div class="about">About Us<br>

    <div class="slideshow-container">

      <br>
      <div id="div1" class="make-center">
        <div class="mySlides fade">

          <a href="#"> <img src="../images/batman-poster.jpg" alt="logo" width="570" ; height="400" ; /></a>

        </div>

        <div class="mySlides fade">

          <a href="#"> <img src="../images/docstrange-banner.jpg" alt="logo" width="570" ; height="400" ; /></a>

        </div>

        <div class="mySlides fade">

          <a href="#"> <img src="../images/happybirthday-banner.jpg" alt="logo" width="570" ; height="400" ; /></a>


        </div>
      </div>



      <div style="text-align:center">
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
      </div>
    </div>
  </div>
  <br><br>
  <div class="text">

    <h2>About Us</h2>
    <p>BuyMyTickets.lk is Sri Lanka’s biggest online tickets portal. We offer a unique and rich experience in purchasing online movie tickets. Sri Lanka’s best theatre chains are accompanied with us to provide the best cinematic experience to the public. BuyMyTickets.lk is the smartest way to book a ticket in Sri Lanka! We have understood the wants and needs of the Sri Lankan public when it comes to booking online tickets. </p>
  </div>

  <br>
  <div class="text1">

    <h2>Our Vision</h2>
    <p>BuyMyTickets.BuyMyTickets.lk is the smartest way to book a ticket in Sri Lanka! We have understood the wants and needs of the Sri Lankan public when it comes to booking online tickets. </p>
  </div>
  <br>
  <center>
    <h2>
      <font color="white">Our Team</font>
    </h2>
  </center>
  <br><br><br><br>

  <div class="body">
    <div class="flip-card">
      <div class="flip-card-inner">
        <div class="flip-card-front">
          <a href="#"> <img class="prof" src="../images/user.png" alt="prof" width="200" ; height="200"></a>

        </div>
        <div class="flip-card-back">
          <h1>Michael Leo</h1>
          <p>Admin & Engineer</p>
          <p>We love that guy</p>
        </div>
      </div>
    </div>

    <div class="flip-card">
      <div class="flip-card-inner">
        <div class="flip-card-front">
          <a href="#"> <img class="prof" src="../images/user.png" alt="prof" width="200" ; height="200" /></a>

        </div>
        <div class="flip-card-back">
          <h1>Isabella Zoey</h1>
          <p>Account Manager & Engineer</p>
          <p>We love that guy</p>
        </div>
      </div>
    </div>

    <div class="flip-card">
      <div class="flip-card-inner">
        <div class="flip-card-front">
          <a href="#"> <img class="prof" src="../images/user.png" alt="prof" width="200" ; height="200" /></a>

        </div>
        <div class="flip-card-back">
          <h1>Olivia Charlotte</h1>
          <p>Manager & UX Designer</p>
          <p>We love that guy</p>
        </div>
      </div>
    </div>
    <br>

    <div class="flip-card">
      <div class="flip-card-inner">
        <div class="flip-card-front">
          <a href="#"> <img class="prof" src="../images/user.png" alt="prof" width="200" ; height="200" /></a>

        </div>
        <div class="flip-card-back">
          <h1>William John</h1>
          <p>Software engineer</p>
          <p>best employee</p>
        </div>
      </div>
    </div>


    <div class="flip-card">
      <div class="flip-card-inner">
        <div class="flip-card-front">
          <a href="#"> <img class="prof" src="../images/user.png" alt="prof" width="200" ; height="200" /></a>

        </div>
        <div class="flip-card-back">
          <h1>Camila Hazel</h1>
          <p>Engineer</p>
          <p>We love that guy</p>
        </div>
      </div>
    </div>






  </div>




  <!--body end-->




  <!--Footer---------------------------->
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
          <li><a href="../html/ContactUs.html">Contact Us</a></li>
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
  <script src="../js/aboutUs.js"></script>
</body>

</html>