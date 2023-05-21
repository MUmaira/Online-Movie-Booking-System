<?php
if (!isset($_SESSION)) {
  session_start();
}

if (!isset($_SESSION['email'])) {
  header("location:login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Seat Reservation</title>
  <!--Font awesome icons-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../css/nav.css" />
  <link rel="stylesheet" href="../css/reserve-seat.css">
  </link>
  <script src="../js/nav.js" defer></script>
  <style>
    .seat-reservation {
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
    }

    .seats {
      background-color: #5d6975;
      width: 1.8rem;
      height: 1.3rem;
      margin: 0.5rem;
      border-top-left-radius: 12px;
      border-top-right-radius: 12px;
    }

    .row {
      display: flex;
    }

    .seats.selected {
      background-color: #b6142c;
    }

    .seats.reserved {
      background-color: #fbfbfb;
    }

    .seats:nth-of-type(2) {
      margin-right: 2rem;
    }

    .seats:nth-last-of-type(2) {
      margin-left: 2rem;
    }

    .seats:not(.reserved):hover {
      transform: scale(1.1);
      cursor: pointer;
    }

    .showcase .seats:not(.reserved):hover {
      transform: scale(1);
      cursor: default;
    }

    .showcase {
      display: flex;
      justify-content: space-between;
      list-style: none;
      padding-bottom: 1rem;
    }

    .showcase li {
      display: flex;
      margin: 0 1rem;
      align-items: center;
    }

    .allseats__screen {
      background-color: #fbfbfb;
      width: 100%;
      height: 8rem;
      box-shadow: 0 3px 10px rgba(255, 255, 255, 0.5);
      transform: rotateX(-45deg);
      margin-bottom: 1.3rem;
    }

    .allseats__screen div {
      color: black;
      justify-content: center;
      align-items: center;
    }

    .allseats {
      perspective: 1200px;
      margin-bottom: 3rem;
    }

    .text {
      margin: 1rem 0;
      display: flex;
      justify-content: center;
      align-items: center;
    }
  </style>
</head>

<?php
//Including the header file
include "header.php";
?>

<?php
//Adding the database connection file
require "config.php";

$sql = "SELECT * from movies";
$result = mysqli_query($connection, $sql);
$movieList = "";

while ($row = $result->fetch_assoc()) {
  $movieList .= "<option value=\"{$row['MID']}\">{$row['M_name']}</option>";
}
?>

<?php

if (isset($_POST['reserve'])) {
  $movieId = $_POST['movie'];
  $theatre = $_POST['theatre'];
  $date = $_POST['date'];
  $time = $_POST['time'];
  $numOfSeats = $_POST['numOfTickets'];

  $_SESSION['movieId'] = $movieId;
  $_SESSION['theatre'] = $theatre;
  $_SESSION['date'] = $date;
  $_SESSION['time'] = $time;
  $_SESSION['numOfSeats'] = $numOfSeats;


  header("Location:billing.php");
}

?>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
  <section>
    <h1>Seat Reservation</h1>
    <div class="reserve">
      <div class="reserve__select-item">
        <label for="movie">Movie : </label>
        <select name="movie" id="movie">
          <?php echo $movieList; ?>
        </select>
      </div>

      <div class="reserve__select-item">
        <label for="theatre">Theatre : </label>
        <select name="theatre" id="theatre">
          <?php echo $theatre; ?>
        </select>
      </div>

      <div class="reserve__select-item">
        <label for="date">Date : </label>
        <input type="date" required min="<?php echo date('Y-m-d'); ?>" id="date" name="date">
      </div>

      <div class="reserve__select-item">
        <label for="time">Time : </label>
        <select name="time" id="time">
          <option value="10:30">10:30</option>
          <option value="1:30">1:30</option>
          <option value="6:30">6.30</option>
        </select>
      </div>

      <div class="reserve__select-item">
        <label for="numOfTickets">Number Of Tickets : </label>
        <select name="numOfTickets" id="numOfTickets">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select>
      </div>
    </div>

    <div class="section-devider"></div>
  </section>


  <section class="seat-reservation">
    <ul class="showcase">
      <li>
        <div class="seats"></div>
        <small>Available</small>
      </li>

      <li>
        <div class="seats selected"></div>
        <small>Selected</small>
      </li>

      <li>
        <div class="seats reserved"></div>
        <small>Reserved</small>
      </li>
    </ul>


    <div class="allseats">
      <div class="allseats__screen">
        <div>Screen</div>
      </div>
      <div class="allseats__seats">
        <div class="row">
          <div class="seats"></div>
          <div class="seats"></div>
          <div class="seats"></div>
          <div class="seats"></div>
          <div class="seats"></div>
          <div class="seats"></div>
          <div class="seats"></div>
          <div class="seats"></div>
          <div class="seats"></div>
          <div class="seats"></div>
        </div>

        <div class="row">
          <div class="seats reserved"></div>
          <div class="seats"></div>
          <div class="seats"></div>
          <div class="seats reserved"></div>
          <div class="seats reserved"></div>
          <div class="seats"></div>
          <div class="seats"></div>
          <div class="seats"></div>
          <div class="seats"></div>
          <div class="seats"></div>
        </div>

        <div class="row">
          <div class="seats"></div>
          <div class="seats"></div>
          <div class="seats"></div>
          <div class="seats"></div>
          <div class="seats reserved"></div>
          <div class="seats"></div>
          <div class="seats"></div>
          <div class="seats"></div>
          <div class="seats"></div>
          <div class="seats"></div>
        </div>

        <div class="row">
          <div class="seats reserved"></div>
          <div class="seats"></div>
          <div class="seats"></div>
          <div class="seats reserved"></div>
          <div class="seats"></div>
          <div class="seats"></div>
          <div class="seats"></div>
          <div class="seats"></div>
          <div class="seats"></div>
          <div class="seats"></div>
        </div>

        <div class="row">
          <div class="seats"></div>
          <div class="seats reserved"></div>
          <div class="seats"></div>
          <div class="seats"></div>
          <div class="seats"></div>
          <div class="seats"></div>
          <div class="seats reserved"></div>
          <div class="seats"></div>
          <div class="seats"></div>
          <div class="seats"></div>
        </div>

        <div class="row">
          <div class="seats reserved"></div>
          <div class="seats"></div>
          <div class="seats reserved"></div>
          <div class="seats"></div>
          <div class="seats"></div>
          <div class="seats reserved"></div>
          <div class="seats"></div>
          <div class="seats"></div>
          <div class="seats"></div>
          <div class="seats"></div>
        </div>
      </div>
    </div>


    <button type="submit" class="reserve-btn" name="reserve">Reserve</button>
  </section>
</form>
<!--Adding the jquery cdn-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
<script src="../js/reserve-seat-ajax.js"></script>
<script src="../js/reserve-seat.js"></script>
<?php
//Including the footer file
include "footer.php";
?>