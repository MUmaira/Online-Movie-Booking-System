<!-- IT21260988 - Randeniya R. A. D. S. E -->
<?php
session_start();
require 'config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <!-- Link for style sheets -->
    <link rel="stylesheet" href="../css/UserDashboard.css">
    <link rel="stylesheet" href="../css/header_navbar.css" />
    <!--Link for FontAwesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

    <?php

    //check if session variable is set
    if (isset($_SESSION['uid'])) {

        //assign session variable to a variable
        $uid = $_SESSION['uid'];

        //sql query to select all values that belongs to the uid from UserAccount table
        $sql = "SELECT * FROM useraccount WHERE UID = $uid ";

        //perform the query
        $result = $connection->query($sql);

        //check if there is a result row
        if ($result->num_rows > 0) {

            //fetch the result row as an associative array
            while ($row = $result->fetch_assoc()) {
                //assign values in the row to variables
                $email = $row['U_email'];
                $phoneNum = $row['U_contact'];
            }
        }

        //sql query to select all values from Customer table
        $sqlCus = "SELECT * FROM Customer WHERE CID = $uid";

        //perform the query
        $resultCus = $connection->query($sqlCus);

        //check if there is a result row
        if ($resultCus->num_rows > 0) {

            //fetch the result row as an associative array
            while ($rowCus = $resultCus->fetch_assoc()) {
                //assign values in the row to variables
                $fname = $rowCus['C_fname'];
                $lname = $rowCus['C_lname'];
                $dob = $rowCus['C_DOB'];
            }
        }
    }

    //echo the details of the user
    echo "<section class='user-info'>";
    echo "    <div class='user-info-1'>";
    echo "        <img class='user' src='../images/user.png'>";
    echo "        <h2 class='username'>" . $fname . " " . $lname . "</h2>";
    
    echo "        <h4> <a href='UpdateProfile.php'>Update Profile<i class='fa-solid fa-pen'></i></a></h4>";
    echo "        <button class='button logout'><a href='logout.php'>Logout</a></button>";
    echo "    </div>";
    echo "    <div class='horizontal-line'></div>";
    echo "    <div class='vertical-line'></div>";
    echo "    <div class='user-info-2'>";
    echo "        <h3 class='user-info-2-heading'>User Info</h3>";
    echo "        <p>Name : " . $fname . " " . $lname . "</p>";
    echo "        <p>Date of Birth : " . $dob . "</p>";
    echo "        <p>Email Address : " . $email . "</p>";
    echo "        <p>Phone Number : " . $phoneNum . "</p>";
    echo "    </div>";
    echo "</section>";

    ?>

    
    <!--Divider-->
    <div class="divider"></div>

    <!--Purchased Movies-->
    <section class="purchased">
        <h1>Purchased Movies</h1>
        <div class="purchased-movie-details">

                
                <?php
                //sql query to select all values from Booking table
                $sql = "SELECT * FROM Booking WHERE CID = $uid";

                ////perform the query
                $result = $connection->query($sql);

                //check if there is a result row
                if ($result->num_rows > 0) {

                    //fetch the result row as an associative array
                    while ($row = $result->fetch_assoc()) {
                        //echo the details            
                        echo"<table>";
                        echo"    <tr>";
                        echo"       <th>Movie</th>" ;
                        echo"       <th>Theatre</th>" ;
                        echo"       <th>Number Of Tickets</th>" ;
                        echo"       <th >Booked Date and Time</th>" ;
                        echo"       <th>Price (Rs.)</th>" ;
                        echo"    </tr>";
                        echo "<tr>";
                        echo "  <td>".$row['B_Movie']."</td>";
                        echo "  <td>".$row['B_theatre']."</td>";
                        echo "  <td>".$row['NumberOfTickets']."</td>";
                        echo "  <td>".$row['B_Date']." at ".$row['B_Time']."</td>";
                        echo "  <td>".$row['Price']."</td>";
                        echo "</tr>";
                        echo"</table>";
                    }
                }else { // if there is no result row
                    echo "<p class='no-purchased'>You haven't purchased any movies</p>";
                }
                ?>

        </div>
    </section>

    <!--Divider-->
    <div class="divider"></div>

    <!--Recommended Movies-->
    <section class="recommended">
        <h1>Recommended Movies</h1>
        <div class="recommended-movie-details">
            <div class="recommended-movie-images">


                <?php
                //sql query to select all values from movies table
                $sql = "SELECT * FROM Movies";

                //perform the query
                $result = $connection->query($sql);

                //check if there is a result row
                if ($result->num_rows > 0) {
                    $i = 4;
                    //fetch the result row as an associative array and display values of four rows
                    while ($row = $result->fetch_assoc() and $i >= 1) {

                        //echo the details
                        echo "<div class='img-wrap'>";
                        echo "    <img class='movie-image' src=".$row['M_img']." alt=''>";
                        echo "    <p class='img-text'>" . $row['M_name'] . "</p>";
                        echo "</div>";
                        $i--;
                    }
                }
                ?>
            </div>
            <div class="btn-container"><button class="see-more-recommended-movies-btn">See More</button></div>

        </div>
    </section>

    <!--Divider-->
    <div class="divider"></div>

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
    <script src="../js/UserDashboard.js"></script>
    <script src="../js/index.js"></script>

</body>
</html>


<?php
//close the connection
$connection->close();
?>