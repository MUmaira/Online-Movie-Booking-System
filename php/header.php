  <?php
  if (!isset($_SESSION)) {
    session_start();
  }
  include 'config.php';
  ?>

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