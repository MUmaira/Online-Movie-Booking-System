<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>

<link rel="stylesheet" href="../css/PaymentPage.css">
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
    text-transform: uppercase;
}

.Container1{
    min-height: 100vh;
    background: #fff;
    display: flex;
    align-items: center;
    justify-content:center;
    flex-flow: column;
    padding-bottom: 60px;
    background-color: #161f28;
    
}

.Container1 form{
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 10px 15px #161f28;
    padding:20px;
    width: 600px;
    padding-top: 160px;
}

.Container1 form .inputBox{
    margin-top: 20px;
}

.Container1 form .inputBox span{
    display: block;
    color:#999;
    padding-bottom: 5px;
}

.Container1 form .inputBox input, .container form .inputBox select{
    width: 100%;
    padding: 10px;
    border-radius: 10px;
    border: 1px solid rgba(0,0,0,.3);
    color:rgb(145, 144, 147);
}

.Container1 form .flexbox{
    display: flex;
    gap: 15px;
}

.Container1 form .flexbox .inputBox{
    flex: 1 1 150px;
}

.Container1 form button, .Container1 form a{
    width: 5%;
    background:linear-gradient(45deg, #161f28, #b6142c);
    margin-top: 40px;
    padding: 10px 80px;
    font-size: 20px;
    border-radius: 50px 20px;
    color:#fbfbfb;
    cursor: pointer;
    transition: 0.2s linear;
    border: 2px solid #161f28;
    text-decoration: none;
}

.Container1 form button:hover{
    letter-spacing: 2px;
    opacity:0.8;
}

.image {
    display: block;
    overflow: hidden;
    margin-left: 40px;
}

.Container1 .card-container{
    margin-bottom: -150px;
    position: relative;
    width: 400px;
    height: 250px;
}

.Container1 .card-container .FrontPageContent{
    position: absolute;
    height: 100%;
    width: 100%;
    top: 0;
    left: 0;
    background:linear-gradient(80deg, #161f28, #b6142c);
    margin-top: 20px;
    border-radius: 5px;
    backface-visibility: hidden;
    box-shadow: 0 2px 15px #fbfbfb;
    padding: 20px;
    transform: perspective(600px) rotateY(0deg);
    transition: transform .4s ease-out;
}

.Container1 .card-container .FrontPageContent .image{
    display: flex;
    align-items:center;
    justify-content:space-between;
    padding-top:10px;

}

.Container1 .card-container .FrontPageContent .image img{
    opacity: 0.8;
}

.container .card-container .FrontPageContent .card-number-box{
    padding: 10px 0;
    font-size: 22px;
    color: #fbfbfb;
}

.Container1 .card-container .FrontPageContent .flexbox{
    display: flex;
}


.Container1 .card-container .FrontPageContent .flexbox .box:nth-child(1){
    margin-right: auto;
}

.Container1 .card-container .FrontPageContent .flexbox .box{
    font-size:15px;
    color:#fbfbfb;
}

.Container1 .card-container .back{
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    background:linear-gradient(80deg, #161f28, #b6142c);
    border-radius: 5px;
    padding: 20px 0;
    text-align: right;
    backface-visibility: hidden;
    box-shadow: 0 15px 25px rgba(0,0,0,.2);
    transform: perspective(600px) rotateY(180deg);
    transition: transform 0.4s ease-out;

}

.Container1 .card-container .back .stripe{
    background:#161f28;
    width: 100%;
    margin: 10px 0;
    height: 50px;
}

.Container1 .card-container .back .box{
    padding: 0 20px;
}

.Container1 .card-container .back .box span{
    color:#fbfbfb;
    font-size: 15px;
}

.Container1 .card-container .back .box .cvv-box{
    height: 50px;
    padding: 10px;
    margin-top: 5px;
    color:#161f28;
    background: #fbfbfb;
    border-radius: 5px;
    width: 100%;
}

.Container1 .card-container .back .box img{
    margin-top: 70px;
    margin-left: 270px;
    opacity: 1.2;
}
</style>

</head>
<body>
    
    <?php 
      include "header.php";
    ?>
  
    

      <div class="Container1">

        <div class="card-container">
            <div class="FrontPageContent">
                <div class="image">
                    <img src="../images/imgChip.png" width="100" height="50" alt="chip image">
                    <img src="../images/img6.png"  width="200" height="100" alt="visa image">
                </div>
                <div class="card-number-box">################</div>
                <div class="flexbox">
                    <div class="box">
                        <span>card holder</span>
                        <div class="card-holder-name">Full Name</div>
                    </div>
                    <div class="box">
                        <span>expires</span>
                        <div class="expiration">
                            <span class="exp-month">mm</span>
                            <span class="exp-year">yy</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="back">
                <div class="stripe"></div>
                <div class="box">
                    <span>cvv</span>
                    <div class="cvv-box">
                        <img src="../images/img6.png" width="100" height=" 50" alt="image visa">
                    </div>
                </div>
            </div>
        </div>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
            <div class="inputBox">
                <span>card number</span>
                <input type="text" maxlength="16" class="card-number-input" name="number" required>
            </div>
            <div class="inputBox">
                <span>card holder</span>
                <input type="text" maxlength="20" class="card-holder-input" name="holder" required>
            </div>
            <div class="flexbox">
                <div class="inputBox">
                    <span>expiration mm</span>
                    <select name="" id="" class="month-input" name="month">
                        <option value="month"  selected disabled>month</option>
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08">08</option>
                        <option value="09">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                </div>
                <div class="inputBox">
                    <span>expiration yy</span>
                    <select name="" id="" class="year-input" name="year">
                        <option value="year"  selected disabled>year</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                        <option value="2026">2026</option>
                    </select>
                </div>
                <div class="inputBox">
                    <span>cvv</span>
                    <input type="password" maxlength="4" class="cvv-input" name="cvv" required>
                </div>
            </div>
           <button name="pay" type="submit">Pay</button>
           <a href="PaymentSuccessful.php">Next Page</a>
        </form>
    </div>

<?php
  include "footer.php";
?>

<?php 
    if($_SESSION['numOfSeats'] * 600 <= 1000){
        $_SESSION['totalPrice'] = $_SESSION['numOfSeats'] * 600 * 95 / 100;
    }
    else if($_SESSION['numOfSeats'] * 600 <= 2000){
        $_SESSION['totalPrice'] = $_SESSION['numOfSeats'] * 600 * 90 / 100;
    }

    else {
        $_SESSION['totalPrice'] = $_SESSION['numOfSeats'] * 600 * 85 / 100;
    }
?>

<?php 
        //adding the connection to the database
        require "config.php";

        if(isset($_POST['pay'])){
            $sessionEmail = $_SESSION['email'];
            $Amount = $_SESSION['numOfSeats'] * 600;
            $FAmount = $_SESSION['totalPrice'];
            $date = $_SESSION['date'];

            $MovieID = $_SESSION['movieId'];
            $Theatre = $_SESSION['theatre'];
            $Tickets = $_SESSION['numOfSeats'];
            $Time = $_SESSION['time'];
    

            $sql1 = "INSERT INTO payment(CustomerEmail,PaymentAmount,FinalPayment,Date) VALUES('$sessionEmail','$Amount','$FAmount','$date')";

            $sql2 = "INSERT INTO booking(MID,CustomerEmail,theatre, tickets,time,date) VALUES('$MovieID','$sessionEmail','$Theatre','$Tickets','$Time','$date')";

            mysqli_query($connection,$sql1);
            mysqli_query($connection,$sql2);
        }
    ?>

<script src="../js/PaymentPage.js"></script>
  </body>
</html>