<?php 

require 'config.php';

$id = $_GET["id"];


$sql =" DELETE FROM movies WHERE MID = '$id'";
if($connection -> query($sql))
{
	echo "<script> alert ('Deleted Succesfully!!!') </script>";
	//re-directing to add movies page
	header("location:Add movies.php");
}	
else {
	echo "<script> alert ('Error: could not  excecute the query.')</script>";

}

?>