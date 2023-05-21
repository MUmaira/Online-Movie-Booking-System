<!DOCTYPE html
<html>
<head>
<meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
<title> Add Theatres  </title>
<link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
      integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
<link rel="stylesheet" href="../css/styles.css">
<link rel="stylesheet" href="../css/formStyles.css">
<link rel="stylesheet" href="../css/tableStyles.css">
<link rel="stylesheet" href="../css/index1.css">
<script>  function delete_data(id){
	 if (confirm("Are you sure to delete the record?")){
		 window.location.href = 'submitDeleteTheatre.php?id='+id;
	 }
}
</script>
<script src="../js/index.js"></script>
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
<style>
a:visited{
	color: #fbfbfb;
}
</style>
</head>

<body>

 <?php include 'headers.php';?>
	
	<br> <br>
<center>
<h2 color = "#fbfbfb" > Add Theatres </h2>
</center>
<br>
 <form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" enctype="multipart/form-data">
   Select Area : 
   <select class="label" id="category" name="category">
   <option value="select">select</option>
   <option value="Colombo">Colombo</option>
   <option value="Kandy">Kandy</option>
   <option value="Kegalle">Kegalle</option>
   <option value="Anuradhapura">Anuradhapura</option>
   <option value="Jaffna">Jaffna</option>
   <option value="Galle">Galle</option>
   <option value="Matara">Matara</option>
   <option value="Ja-Ela">Ja-Ela</option>
   <option value="Gampaha">Gampaha</option>
   <option value="Badulla">Badulla</option>
   </select>
   <br> <br>
   Theatre Name : 
   <input class="label" type="text" name="title" placeholder="Add name">
   <br> <br>
   Published Date : 
   <input class="label" type="date" name="date" placeholder="Enter date">
   <br> <br>
   Seat Types :
   <input class="label" type="text" name="sType">
   <br> <br>
   No of Seats : 
   <input class="label" type="number" name="sNo">
   <br> <br>
   Description : <br>
   <textarea name="description" rows="5" cols="65"> </textarea>
   <br> <br>
  
   Select image to  upload: <br>
       <input type="file" name="fileFeildName" id="fileToUpload">
	  <br><br><br>
	  <!--Uploading the image into a folder-->
	   <?php
         if(isset($_POST["submit"])) { 
         $target_dir = "uploadsT/";
         $target_file = $target_dir. basename($_FILES["fileFeildName"]["name"]);

          if (isset($_FILES["fileFeildName"])) {
	      if(move_uploaded_file($_FILES["fileFeildName"] ["tmp_name"],$target_file)) {
		   echo "The file".basename($_FILES["fileFeildName"]["name"])." is uploaded";
	     }
	      else{
	 	echo "Error while uploading the file";
	      }
        }
       else{
	      echo "File not available";
        }
        }

         ?>
	   <br>
	  <br><br>
    <input type="submit" class="button" value = "Add Theatre" name="submit">
	</form>
	
<br><br><br>
<!--Inserting data in the form to the database-->

<?php
require 'config.php';
if (isset($_POST["submit"])){
$Tloc=$_POST["category"];
$Tname=$_POST["title"];
$Tdate=$_POST["date"];
$Tstype=$_POST["sType"];
$Tseats=$_POST["sNo"];
$Tdesc=$_POST["description"];
$target_dir = "uploadsT/";
$target_file = $target_dir. basename($_FILES["fileFeildName"]["name"]);



$sql =" INSERT INTO theatres (T_location,T_name,T_date,T_Stype,T_seats,T_desc,T_img) VALUES ('$Tloc','$Tname','$Tdate','$Tstype','$Tseats','$Tdesc', '$target_file')";

if ($connection -> query($sql))
{
	echo "<script> alert('Inserted Succesfully')</script>";
}
else
{
	echo "Error".$connection->error;
}

$connection->close();
//displaying data in the database in a table
}
require 'config.php';

$sql = "SELECT TID, T_name FROM theatres";
$result = $connection->query($sql);

 
if ($result-> num_rows > 0 ) {
   echo "<center>";
  echo "<table border='1' width='50%'><tr><th><b>ID</b></th><th><b>Name</b></th><th><b>Update</b></th><th><b>Delete</b></th></tr>";
	while($row = $result->fetch_assoc()) {
		$id=$row["TID"];
		//read and utilize the row data
		echo "<tr><td>".$row["TID"]."</td><td>".$row["T_name"]."</td>";
		echo "<td><button class='button3' type='submit'><a href='UpdateTheatres.php?id=$id'> Update </button></td>";
		echo "<td><button class='button2' type='submit' onclick='delete_data($id)'> Delete </button></td></tr>";
	}
  echo"</table>";
  echo "</center>";
}  
else{
	echo "no results";
}

//$con->close();
?>
<hr>
 <?php include 'footers.php';?>
  </body>
</html>