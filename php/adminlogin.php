<?php require_once('config.php'); ?>
<?php
if(isset($_POST['submit'])){

if(!isset($_POST['username']) || strlen(trim($_POST['username']))<1){
  $errors[] = 'username is missing';
}

if(!isset($_POST['username']) || strlen(trim($_POST['username']))<1){
  $errors[] = 'password is missing';
}

//check if there are any errors in the form
if(empty($errors)){

//save username and password into variables
  $username = mysqli_real_escape_string($connection, $_POST['username']);

   $password = mysqli_real_escape_string($connection, $_POST['password']);

  

   //prepare database quary
   $quary = "SELECT *FROM admin
              WHERE username = '{$username}'
              AND password = '{$password}'
              LIMIT 1"; 

   $result_set= mysqli_query($connection, $quary);
   
   if ($result_set){
    //query success
    if (mysqli_num_rows($result_set) == 1){
      //valied user found
      header('Location: Admin Dashboard.php');
    }else{

      $errors[] = 'Invalied username/password';
    }
  }else{

      $errors[] = 'Database query failed';
       }
    }            
}


?>
<!DOCTYPE html> 
<html lang="en"> 
 <head> 
 	 <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
 <title>Admin login page</title>
   
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
	

	  <a href="#"> <img class="img2"  src="../images/logo.jpg" alt="logo" width="200"; top =10px;  height="100"; left= 1px;/></a>
	  <a href="#"> <center> <img class="img" src="../images/admin.png" alt="admin" width="100";  height="100"; /> </center></a>
	 

 
 
 <h1><center><font color="white" > Admin</font></center></h1>

<div class="loginbox">
	<form  action="adminlogin.php" method="POST" >

		<center><p> ADMIN NAME</p>
     
		<input type="text" name="username" id=""placeholder=""></center>
         <br>
		<center><P> PASSWORD</P>
         <br>
		<input type="password" name="password" placeholder="" id=""></center>
         <br>
         <label for="remember"> remember me</label>
         <input type="checkbox" name="remember" value="" >
         <br>
         <?php
         if(isset($errors) && !empty($errors)){
          echo '<p class="error">Invalid username / password</p>';
         }
         ?>
        
           <br>
		  <button class="button" type="submit" name="submit">LOG IN </button>    
        </form>
        </div>

        <footer></footer>



 </body> 
</html> 
