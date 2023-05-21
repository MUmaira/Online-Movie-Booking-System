<?php 

require 'config.php';

$id = $_GET["id"];


$sql =" DELETE FROM theatres WHERE TID = '$id'";
if($connection -> query($sql))
{
	echo "<script> alert ('Deleted Succesfully!!!') </script>";
	//re-directing to add theatres page
	header("location:Add theatres.php");
}	
else {
	echo "<script> alert ('Error: could not  excecute the query.')</script>";

}

?>