<!DOCTYPE html
<html>
<head>
<meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
<title> Add Movies  </title>
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
		 window.location.href = 'submitDeleteMovie.php?id='+id;
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
<style>
table{
	align:center;
	border: 1px  ;
	border-collapse: collapse;
	background-color: #333333;
}

th, td{
	color:#fbfbfb;
	text-align: center;
	padding: 10px;
}

.button2 {
	background:#b6142c;
	padding: 2px 5px;
	text-align: center;
	color: #fbfbfb;
	cursor: pointer;
	border-radius:4px;
}

.button2:hover{
	background-color:#A9A9A9;
}

.button3 {
	background:#8B8000;
	padding: 2px 5px;
	text-align: center;
	color: #fbfbfb;
	cursor: pointer;
	border-radius:4px;
}

.button3:hover{
	background-color:#A9A9A9;
}

a:link{
	color:#fbfbfb;
}

</style>
</head>

<body>

<?php include 'headers.php';?>
<br> <br>
<center>
<h2 color = "#fbfbfb" > Add Movies </h2>
</center>
<br>

 <form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" enctype="multipart/form-data">
   Select Category : 
   <select class="label" id="category" name="category" >
   <option class="effect" value="select">select</option>
   <option class="effect" value="Horror">Horror</option>
   <option class="effect" value="Sci-Fi">Sci-Fi</option>
   <option class="effect" value="Comedy">Comedy</option>
   <option class="effect" value="Fiction">Fiction</option>
   </select>
   <br> <br>
   Add Title : 
   <input class="label" type="text" name="title" placeholder="Add Title">
   <br> <br>
   Theatre :
   <input class="label" type="text" name="theatre" placeholder="Enter Theatre name">
   <br><br>
   Released Date : 
   <input class="label" type="date" name="date" placeholder="Enter date">
   <br> <br>
   Show-Time :
   <input class="label" type="time"  name="time" placeholder="Enter time">
   <br> <br>
   Description : <br>
   <textarea name="description" rows="5" cols="65"> </textarea>
   <br> <br>
  
   Select image to  upload: <br>
       <input type="file" name="fileFeildName" id="fileToUpload">
	  <br><br>
	  <br>
	  
	   <!--Uploading the image-->
       <?php
         if(isset($_POST["submit"])) { 
         $target_dir = "uploadsM/";
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
	  <br><br>
   <input type="submit" class="button" value = "Add Movie" name="submit">
    </form>
<br><br><br>
<!--Inserting data entered in the form -->	
<?php
require 'config.php';
if (isset($_POST["submit"])){
$Mcat=$_POST["category"];
$Mname=$_POST["title"];
$Mtheatre=$_POST["theatre"];
$Mdate=$_POST["date"];
$Mtime=$_POST["time"];
$Mdesc=$_POST["description"];
$target_dir = "uploadsM/";
$target_file = $target_dir. basename($_FILES["fileFeildName"]["name"]);



$sql =" INSERT INTO movies (M_cat,M_name,M_theatre,M_date,M_time,M_desc,M_img) VALUES ('$Mcat','$Mname','$Mtheatre','$Mdate','$Mtime','$Mdesc', '$target_file')";

if($connection -> query($sql))
{
	echo "<script> alert('Inserted Succesfully')</script>";
}
else
{
	echo "Error".$connection->error;
}

$connection->close();
}
//displaying records in the database using a table
require 'config.php';

$sql = "SELECT MID, M_name FROM movies ";
$result = $connection->query($sql);
 
if ($result-> num_rows > 0 ) {
   echo "<center>";
  echo "<table border='1' width='50%'><tr><th><b>ID</b></th><th><b>Name</b></th><th><b>Update</b></th><th><b>Delete</b></th></tr>";
	while($row = $result->fetch_assoc()) {
		$id=$row["MID"];
		echo "<tr><td>".$row["MID"]."</td><td>".$row["M_name"]."</td>";
		echo "<td><button class='button3' type='submit'> <a href='UpdateMovie.php?id=$id'>Update </button></td>";
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
