<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Offers Page</title>
    
    <link rel="stylesheet" href="../css/OfferPage.css">
    <link rel="stylesheet" href="../css/nav.css">
    <script src="../js/nav.js" defer></script>

    <style>
      * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    background-color: #161f28;
    color: #fbfbfb;
}
.coupon {
    border: 3px solid #fbfbfb; 
    border-radius: 10px;
    width: 32%;
    margin: 0 auto; 
    max-width: 600px;
    height:420px;
  } 

.intro h1, .intro h2 {
  text-align: center;
  padding-top:60px;
}

 .Offer{
  color:#fbfbfb;
}

.coupon-container {
    display: flex;
    justify-content: space-between;
    margin-top: 30px;  
    margin-bottom : 40px;
}

.container {
  display: flex;
  justify-content: center;
  align-items: center;
}


.container-img {
     display: flex;
     justify-content: center;
     align-items: center;
     margin-top:4px;
}

.container div {
  display: flex;
  justify-content: center;
}
  

.coupon-container .coupon .btn {
    text-decoration: none;
    background:linear-gradient(45deg, #161f28, #b6142c);
    padding: 16px;
    display: inline-block;
    width: 100%;
    color: #fbfbfb;
    box-sizing: border-box;
    margin: auto;
    margin-top: 24px;
    margin-bottom: 5px;
    font-size: 24px;
    font-weight: 900;
    text-transform: uppercase;
    text-align: center;
    transition: 0.2s linear;
    border: 1px solid #fbfbfb;
    border-radius: 50px 20px;
  }

.coupon-container .coupon .btn:hover{
    letter-spacing: 2px;
    opacity:0.8;
}
    </style>
</head>
<body>
  
<?php
  include "header.php";
?>


    <div class="intro">
    <h1> Get Your Offers</h1>
        <br>
        <h2>Enjoy your Movie with Us</h2>

    </div>
        <span class="bdr1"></span>
    

    <div class="coupon-container">

        <div class="coupon">
              <div class="container-img">
                <img class="img"src="../images/gift.jpg" alt="gift-image">
              </div>
              
              <div class="container">
              <h2>Get Your Offer by clicking on Redeem</h2>
              </div>

              <a class="btn" href="PaymentPage.php">Redeem</a>
        </div>
    
    </div>
    
<?php
  include "footer.php";
?>
    
</body>
</html>

