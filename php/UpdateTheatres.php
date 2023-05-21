<!DOCTYPE html
<html>
<head>
<meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title> Update Theatres  </title>
<link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
      integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
<link rel="stylesheet" href="../css/styles.css">
<link rel="stylesheet" href="../css/formStyles.css">
<link rel="stylesheet" href="../css/formtableStyles.css">
<link rel="stylesheet" href="../css/index1.css">
<script src="../js/index.js"> </script>
<script src="../js/form.js"></script>
<style>
form{
  width :550px;
  margin:auto;
  padding:20px;
  background:#b6142c;
  font-size:14px;
  font-family:'Roboto', sans-serif;
  color:white;
  text-align: left;
} 

h2{
	font-family: 'Roboto', sans-serif;
	color:#fbfbfb;
	font-weight:bold;
	
}

.label{
	width:500px;
	display: inline-block;
	
}

.button1{
	background:#fbfbfb;
	padding: 5px 10px;
	text-align: center;
	color: black;
	cursor: pointer;
	border-radius:4px;
}

.button1:hover{
	background-color:#D3D3D3;
}

.button3 {
	background:#8B8000;
	padding: 2px 5px;
	text-align: center;
	color: #fbfbfb;
	cursor: pointer;
	border-radius:4px;
}

.button{
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 8px;
}

.button:hover{
	background-color:#45a049;
}

</style>
</head>

<body>

 <?php include 'headers.php'; ?>
	<br><br>
<center>
<h2 color = "#fbfbfb" > Update Theatres </h2>
</center>
 <!--Getting data in the database to the form-->
      <?php
        require 'config.php';
	 
          $id=$_GET["id"];
		  echo $id;
          $sql = "SELECT TID, T_name, T_Stype, T_seats, T_desc FROM theatres WHERE TID = '$id'";
                   
          if($result = $connection->query($sql)){
            if ($result-> num_rows > 0 ) {
   
	              while($row = $result->fetch_assoc()) {
		             $Tname= $row["T_name"];
		             $Stype= $row["T_Stype"];
		             $Sno=$row["T_seats"];
		             $desc=$row["T_desc"];
	                }

              }  
		  }
         ?>
   <form method="post" action="submitUpdateTheatres.php?id=<?php echo $id?>">	 
    Theatre Name : 
   <input class="label" type="text" name="title" value="<?php echo $Tname?>">
   <br> <br>
   Seat Types :
   <input class="label" type="text" name="sType" value="<?php echo $Stype?>">
   <br> <br>
   No of Seats : 
   <input class="label" type="number" name="sNo" value="<?php echo $Sno?>">
   <br> <br>
   Description : <br>
   <textarea name="description" rows="5" cols="65"><?php echo $desc ?> </textarea>
   <br> <br>
        
         <input type="submit" class="button3" value = "Update">
   
       </form>
 <hr>
<?php include 'footers.php';?>
  </body>
</html>