<?php   
include "config.php";

if(isset($_GET['id'])){
  $id=$_GET['id'];
  $delete=mysqli_query($connection," DELETE FROM `fdata` WHERE `id`='$id'");

}

 $connection=mysqli_connect("localhost","root","","online movie booking system"); //database connection  
 //hostname, username, password, database name  

 //check database connect or not  
 $query="select * from fdata";  
 $connect=mysqli_query($connection,$query);  
 $num=mysqli_num_rows($connect); //check in database any data have or not  

//DELETE DATA


 ?> 
<!DOCTYPE html> 
<html lang="en"> 
 <head> 
 	 <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
 <title>Feedback Admin</title>
   
     <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
      integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="../css/Styles1.css" />
    <script src="../js/index.js" defer></script>

</head>
<body>
	

 <a href="#"><span><img src="../images/logo.jpg" alt="logo" width="200" height="100" /></a>
  <div class="profile">

      <a href="#"><img src="../images/p3.png" alt="logo" width="50" height="50" /></a>
      <p><font color="white" top="20px">Admin</font></p>
  </div>
  <div class="text feedback"><h2><font color="#B6142C" size="16">Customer Feedbacks</font></h2>

<div class="display">  
  
      <table border="1">  
           <tr>  
                <th>NO</th>  
                <th>Customer Name</th>  
                <th>Email</th>  
                <th>Feedback</th>  
                <th>Delete</th> 

                
           </tr>  
           <?php  
                  
                  
                if ($num > 0) {  
                     while($data=mysqli_fetch_assoc($connect)){  
                          echo "  
                               <tr>  
                               <td>".$data['id']."</td>  
                               <td>".$data['name']."</td>  
                               <td>".$data['email']."</td>  
                               <td>".$data['feedback']."</td> 
                               <td>
                               <a href ='feedbacks.php? id=".$data['id']."' class='delete'> Delete</a>
                               </td>

             
                               </tr>  
                          ";  
                     }  
                }  
           ?>  
      </table>  
 </div>  

 <button type="button"  class="back"><a  class="link" href="Admin Dashboard.php">Back To Dashboard</a></button>
 <!--Footer---------------------------->
    <footer class="footer">
      <div class="footer__content">
        <div class="footer__content-company">
          <h3>Our Company</h3>
          <ul>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Privacy Policies</a></li>
          </ul>
        </div>

        <div class="footer__content-support">
          <h3>Help and Support</h3>
          <ul>
            <li><a href="#">Contact Us</a></li>
            <li><a href="#">FAQ</a></li>
          </ul>
        </div>

        <div class="footer__content-social">
          <div>
            <a href="#">Feedback</a>
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
 </body> 
</html> 