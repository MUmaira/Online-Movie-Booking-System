<?php 
    require "config.php";

    $email = $_GET['email'];

    $sql = "SELECT * FROM fdata WHERE email = '$email'";
    if($result = mysqli_query($connection,$sql)){
            while($row = $result->fetch_assoc()){
                $name = $row['name'];
                $feedback = $row['feedback'];
            
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/feedbackUpdate.css">
    <title>Update</title>
</head>
<body>
    <section>
    <form class="feedback-form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
        <input type="text" name="name" placeholder="Full Name" autocomplete="off" value="<?php echo $name ?>">
        <textarea name="feedback" cols="30" rows="10" placeholder="Feedback"><?php echo $feedback ?></textarea>
        <input type="hidden" name="email" value="<?php echo $_GET['email']; ?>">
        <button type="submit" name="update">Update</button>
    </form>
  </section>


<?php 
    if(isset($_POST['update'])){
        $updatedName = $_POST['name'];
        $updatedFeedback = $_POST['feedback'];
        $email = $_POST['email'];

        $query = "UPDATE fdata set name = '$updatedName', feedback = '$updatedFeedback' WHERE email = '$email'";

        if($result = $connection->query($query)){
            echo "Updated successfully";
            header("Location:feedback.php");
        }else {
            echo "Error" .$connection->error;
        }
    }
?>