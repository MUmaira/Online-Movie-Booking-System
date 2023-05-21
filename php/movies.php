<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Movies</title>
    <!--Font awesome icons-->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
      integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="../css/nav.css" />
    <link rel="stylesheet" href="../css/movies.css"></link>
    <script src="../js/nav.js" defer></script>
  </head>

<?php 
    //Including the header file
    include "header.php";
?>

    <h1>Movies</h1>
    <section>
      <div class="search">
        <input type="text" />
        <i class="fa-solid fa-magnifying-glass"></i>
      </div>

      <h2>Now Showing</h2>
      <div class="movie">

      <?php 
        //Including the database connection file
        require "config.php";

        //query to select all the movies in the database
        $sql = "SELECT * FROM movies";
        $result = mysqli_query($connection,$sql);

        if($result){
          if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
              ?>

                <div class="movie__item">
                  <div class="movie__item-img">
                    <img
                      src="<?php echo $row['M_img'] ?>"
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
          $query = "SELECT * FROM upcoming_movies";
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

<?php
    //Including the footer file
    include "footer.php";
?>