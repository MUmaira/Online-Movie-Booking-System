<?php 
    //adding the database connection file
    require "config.php";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT * FROM mt_details WHERE MID = '$id'";
        $result = mysqli_query($connection,$sql);
        $theatreList = "";
        while($row = $result->fetch_assoc()){
            $theatreList .= "<option value=\"{$row['M_theatre']}\">{$row['M_theatre']}</option>";
        }

        echo $theatreList;
    }else {
        echo "<option>Error</option>";
    }
?>