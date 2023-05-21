<?php 

require 'config.php';

$id=$_GET["id"];
$Tname=$_POST["title"];
$Stype=$_POST["sType"];
$Sno=$_POST["sNo"];
$desc=$_POST["description"];

$sql = "UPDATE theatres  SET T_name='$Tname', T_Stype='$Stype', T_seats='$Sno', T_desc='$desc' WHERE TID='$id' ";
if($connection-> query ($sql)){
	echo "<script> alert ('Updated  Succesfully!!!')</script>";
	//re-directing to index page
	header("location:Add theatres.php");
}	
else {
	echo "<script> alert ('Error: could not  excecute the query.')</script>";
	//echo $sql;
}

?>