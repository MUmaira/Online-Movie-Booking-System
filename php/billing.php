<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing Details Page</title>

    <link rel="stylesheet" href="../css/billing.css">
    <link rel="stylesheet" href="../css/nav.css">
    <script src="../js/nav.js" defer></script>

    <style>
    *{
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    outline:none;
    border:none;
    text-decoration: none;
   
}

.billing-container {
  display:flex;
  justify-content: space-between;
  align-items: center;
}

.Input-container , .ticket-container{

    display: flex;
    justify-content:center;
    flex-flow: column;
    padding-bottom: 60px;
    background-color: #161f28;
    color:#161f28;
    
}

.Input-container form{
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 10px 15px #161f28;
    padding:20px;
    width: 500px;
    margin-top:10px;
    margin-left: 200px;
}


.Input-container form .inputBox span{
    display: block;
    color:#161f28;
    padding-bottom: 5px;
}

.Input-container form .submit-btn{
    width: 100%;
    background:linear-gradient(45deg, #161f28, #b6142c);
    margin-top: 20px;
    padding: 10px;
    font-size: 20px;
    border-radius: 50px 20px;
    color:#fff;
    cursor: pointer;
    transition: 0.2s linear;
    border:2px solid #161f28;
}

.Input-container form .submit-btn:hover{
    letter-spacing: 2px;
    opacity:0.8;
}

.Input-container h2 {
    text-align: center;
    Padding-top: 20px;
}


.ticket-container{
    margin-right: 80px;
    background-color:#fbfbfb;
    border-radius: 5px;
}

.ticket-container h2 {
    text-align: center;
    Padding-top: 20px;
}

.name, .phone, .email,.BID, .Movie_ID, .Theatre, .Ticket, .Payment, .Date, .Time, .TicketPerPrice {
    display:flex;
    padding : 10px;
}
           
.customer-name-input{
  padding:6px;
  border: 1px solid #161f28;
  border-width:30%;
  border-radius: 8px;
}

.customer-mobile-input{
  padding:6px;
  border: 1px solid #161f28;
  border-width:30%;
  border-radius: 8px;
}

.customer-email-input{
  padding:6px;
  border: 1px solid #161f28;
  border-width:30%;
  border-radius: 8px;
}

.update-email {
    text-decoration: none;
    padding: 10px 20px;
    background-color: #b6142c;
    color: #fbfbfb;

}

      
    </style>

</head>
<body>


          <?php 
            require "config.php";
            $sessionEmail = $_SESSION['email'];
            $sql = "SELECT * FROM customer WHERE C_email LIKE '$sessionEmail'";

            if($result = $connection->query($sql)){
              if($row = $result->fetch_assoc()){
                $name = $row['C_fname'];
                $phone = $row['C_contact'];
                $email = $row['C_email'];
              }
            }
          ?>
    <?php
      include "header.php";
    ?>

    



    
    <div class="billing-container">
    <div class="ticket-container">
          <h2>Your ticket</h2>
          
          <div class="name">
              <span>Customer : </span>
              <div class="ticket-name"></div>
          </div>

          <div class="phone">
              <span>Phone :</span>
              <div class="ticket-phone">
              </div>
          </div>

          <div class="email">
              <span>Email :</span>
              <div class="ticket-email" value></div>
          </div>

          <div class="Movie_ID">
              <span>Movie Id :</span>
              <div class="ticket-movie"><?php echo $_SESSION['movieId']; ?></div>
          </div>

          <div class="Theatre">
              <span>Theatre Name :</span>
              <div class="ticket-theatre"><?php echo $_SESSION['theatre']; ?></div>
          </div>

          <div class="Date">
              <span>Date :</span>
              <div class="ticket-date"><?php echo $_SESSION['date']; ?></div>
          </div>

          <div class="Time">
              <span>Time :</span>
              <div class="ticket-time"><?php echo $_SESSION['time']; ?></div>
          </div>

          <div class="Ticket">
              <span>Ticket(s) Amount :</span>
              <div class="ticket-amount"><?php echo $_SESSION['numOfSeats']; ?></div>
          </div>

          <div class="TicketPerPrice">
              <span>Price Per Ticket :</span>
              <div class="ticket-Price">Rs.600</div>
          </div>

          <div class="Payment">
              <span>Total Amount :</span>
              <div class="ticket-payment">Rs: <?php echo $_SESSION['numOfSeats'] * 600?></div>
          </div>
        </div>
        <div class="Input-container">
            <form method="POST" action="OfferPage.php">
            <h2>Customer Details</h2>
                <div class="inputBox">
                    <span>Customer Name :</span>
                    <input type="text" class="customer-name-input" value="<?php echo $name ?>" name="Name">
                </div>
    
              </br>
                <div class="inputBox">
                    <span>Mobile no :</span>
                    <input  type="tel" maxlength="10" class="customer-mobile-input" value="<?php echo $phone ?>" name="Mobile">
                    
                </div>

                <div class="update-details">
                    <a href="billing-update.php?email=<?php echo $sessionEmail ?>">Update</a>
                </div>
                
              </br>
                    <div class="inputBox">
                      <span>Email address :</span>
                      <input  type="'email" maxlength="30" class="customer-email-input" value="<?php echo $email ?>"  name="Email">
                    </div>
                
    
              </br>
                <input type="checkbox" id="check" required>
                <label class="privacy">Accept privacy policy</label>
                <input type="submit" value="submit" class="submit-btn">
    
            </form>
        </div>
    </div>

    
<?php 
    if(isset($_POST['update'])){
        $updatedName = $_POST['Name'];
        $updatedMobile = $_POST['Mobile'];
        $email = $_SESSION['email'];

       $query = "UPDATE customer set C_fname = '$updatedName', C_contact = '$updatedMobile' where C_email LIKE '$email'";

        if($result = $connection->query($query)){
            echo "Updated successfully";
            header("Location:OfferPage.php");
        }else {
            echo "Error" .$connection->error;
        }
    }
?>
    
    
     <?php
      include "footer.php";
    ?>

    <script src="../js/billing.js"></script>

</body>
</html>

