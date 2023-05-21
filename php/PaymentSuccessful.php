<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Successful Page</title>
    
    <link rel="stylesheet" href="../css/PaymentSuccessful.css">
    <!--Font awesome icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" 
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="../css/nav.css">
    <script src="../js/nav.js" defer></script>
</head>
<body>
     <?php
        include "header.php";
     ?>

    <!--Our Team-->
    <div class="Payment-Successful">

         <!--images-->
        <div class="pic">
            <a href="#p1"><img src="../images/img5.png" alt="payment success logo" ></a>
           
        </div>

        <h1> Your Payment is successfull</h1>
        <br>
        <h2>Enjoy your Movie</h2>
        <span class="bdr1"></span>
        
        

        <!--description-->

        <!--person-1-->
        <div class="desc" id ="p1">
            <span class="name">Quick Book</span>
            <span class="social">
                <i class="fab fa-facebook"></i>
                <i class="fab fa-twitter"></i>
                <i class="fab fa-linkedin"></i>
            </span>
            <span class="bdr1"></span>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing 
               elit. Consequuntur quae, enim illum sed facere assumenda
               doloremque aliquam cum alias quisquam voluptatem tenetur,
               nihil impedit non! Nobis ipsam expedita animi illum?</p>

        </div>

        

        <div class="Feedback">
            <p>We are loving to hear your thoughts about us</p>
        </div>
            <a href="feedback.php" class="btn">Leave a Feedback</a>
    

        <!--Bottom div-->
        <div class="bdr2"></div>
    </div>
    
    <?php
        include "footer.php";
    ?>

    
</body>
</html>