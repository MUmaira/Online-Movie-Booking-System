<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <!--Font awesome icons-->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
      integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="../css/nav.css" />
    <link rel="stylesheet" href="../css/index.css"></link>

    <style>
        /* Styles for the movies and upcoming movies */
        section {
            margin: 2rem auto 1rem;
            width: 80%;
            height: 100vh;
        }

        .movie,
        .upcoming {
            margin-top: 2rem;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(13rem, 1fr));
            gap: 3rem;
        }

        .movie__item,
        .upcoming__item {
            border-radius: 0.5rem;
            overflow: hidden;
            cursor: pointer;
            transition: all 0.3s linear;
        }

        .movie__item:hover,
        .upcoming__item:hover {
            transform: translateY(-0.75%);
        }

        .movie__item-img img,
        .upcoming__item-img img {
            width: 100%;
            height: auto;
        }

        .movie__item-content,
        .upcoming__item-content {
            padding: 2rem 1rem;
        }

        .movie__item-content h3,
        .upcoming__item-content h3 {
            text-align: center;
        }

        .movie__item-content div,
        .upcoming__item-content div {
            background-color: #b6142c;
            width: 40%;
            padding: 0.5rem 0;
            border-radius: 0.3rem;
            text-align: center;
            margin: 1rem auto;
        }

        .movie__item-content a,
        .upcoming__item-content a {
            color: #fbfbfb;
            text-decoration: none;
        }
    </style>
    <script src="../js/nav.js" defer></script>
  </head>

<?php 
    //Including the header file
    include "header.php";
?>


<!--Slider-->
    <div class="slider">
      <!--Radio buttons for each slide-->
      <input type="radio" name="slide" id="slide1" />
      <input type="radio" name="slide" id="slide2" />
      <input type="radio" name="slide" id="slide3" />
      <input type="radio" name="slide" id="slide4" />
      <input type="radio" name="slide" id="slide5" />

      <div class="slider__slide">
        <div class="slider__slide-item current">
          <img
            src="../images/docstrange-banner.jpg"
            alt="Doctor Strange in the Multiverse of Madness"
          />
          <div>
            <h2>Doctor Strange in the Multiverse of Madness</h2>
          </div>
        </div>

        <div class="slider__slide-item">
          <img src="../images/uncharted-banner.jpg" alt="Uncharted" />
          <div>
            <h2>Uncharted</h2>
          </div>
        </div>

        <div class="slider__slide-item">
          <img
            src="../images/batman-poster.jpg"
            alt="The Batman"
          />
          <div>
            <h2>The Batman</h2>
          </div>
        </div>

        <div class="slider__slide-item">
          <img
            src="../images/happybirthday-banner.jpg"
            alt="Happy Birthday"
          />
          <div>
            <h2>Happy Birthday</h2>
          </div>
        </div>

        <div class="slider__slide-item">
          <img
            src="../images/sonic-banner.jpg"
            alt="Sonic The Hedgehog 2"
          />
          <div>
            <h2>Sonic The Hedgehog 2</h2>
          </div>
        </div>
      </div>

      <!--Arrows for the navigation-->
      <a href="#" class="slider__arrow left"
        ><i class="fa-solid fa-arrow-left"></i
      ></a>
      <a href="#" class="slider__arrow right"
        ><i class="fa-solid fa-arrow-right"></i
      ></a>

      <div class="slider__radio">
        <label for="slide1" class="radio-btn active"></label>
        <label for="slide2" class="radio-btn"></label>
        <label for="slide3" class="radio-btn"></label>
        <label for="slide4" class="radio-btn"></label>
        <label for="slide5" class="radio-btn"></label>
      </div>
    </div>
    
    <!--Now showing movies-->
    <section>
      <h2>Now Showing</h2>
      <div class="movie">

      <?php 
        //Including the database connection file
        require "config.php";

        //query to select all the movies in the database
        $sql = "SELECT * FROM movies LIMIT 4";
        $result = mysqli_query($connection,$sql);

        if($result){
          if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
              ?>

                <div class="movie__item">
                  <div class="movie__item-img">
                    <img
                      src="<?php echo $row['M_img']; ?>"
                      alt="<?php echo $row['M_name']; ?>"
                    />
                  </div>
                  <div class="movie__item-content">
                    <h3><?php echo $row['M_name']; ?></h3>
                    <div>
                      <a href="reserve-seat.php?id='<?php echo $row['MID'] ?>'">Book Tickets</a>
                    </div>
                  </div>
                </div>
      
            <?php 
                  }
                }
              }
            ?>
      </div>
    </section>


    <!--Upcoming Movies-->
    <section>
      <h2>Coming Soon</h2>
      <div class="upcoming">

        <?php 
          $query = "SELECT * FROM upcoming_movies LIMIT 4";
          $result = mysqli_query($connection,$query);

          if($result){
            if($result->num_rows > 0){
              while($row = $result->fetch_assoc()){
                ?>

                  <div class="upcoming__item">
                    <div class="upcoming__item-img">
                      <img
                        src="<?php echo $row['Up_img']; ?>"
                        alt="<?php echo $row['Up_Name']; ?>"
                      />
                    </div>
                    <div class="upcoming__item-content">
                      <h3><?php echo $row['Up_Name']; ?></h3>
                    </div>
                  </div>

        <?php        
              }
            }
          }
        ?>
      </div>
    </section>

<script src="../js/index.js"></script>

<?php
    //Including the footer file
    include "footer.php";
?>