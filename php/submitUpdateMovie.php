<?php 
//updating entered details
require 'config.php';

$id=$_GET["id"];
 $title= $_POST["title"];
 $theatre=$_POST["theatre"];
 $showT=$_POST["time"];
 $desc=$_POST["description"];

$sql = "UPDATE movies  SET M_name='$title',M_theatre='$theatre', M_time='$showT', M_desc='$desc' WHERE MID='$id' ";
if($connection -> query ($sql)){
	echo "<script> alert ('Updated  Succesfully!!!')</script>";
	//re-directing to index page
	header("location:Add movies.php");
}	
else {
	echo "<script> alert ('Error: could not  excecute the query.')</script>";
	//echo $sql;
}

?>