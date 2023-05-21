<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/billing-update.css">
    <link rel="stylesheet" href="../css/nav.css">
    <script src="../js/nav.js" defer></script>

    <title>Update User details</title>
</head>
<body>
<?php
      include "header.php";
?>

<?php 
    require "config.php";

    $email = $_GET['email'];

    $sql = "SELECT * FROM customer WHERE C_email LIKE '$email'";
    if($result = mysqli_query($connection,$sql)){
            while($row = $result->fetch_assoc()){
                $name = $row['C_fname'];
                $phone = $row['C_contact'];
            
    }
}
?>

<section>
    <form class="billingUpdate-form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
        <input type="text" name="name" placeholder="Full Name" autocomplete="off" value="<?php echo $name ?>">
        <input type="text" name="mobile" placeholder="Mobile Number" autocomplete="off" value="<?php echo $phone ?>">
        <input type="hidden" name="email" value="<?php echo $_GET['email']; ?>">
        <button type="submit" name="update">Update</button>
    </form>
</section>

<?php 
    if(isset($_POST['update'])){
        $updatedName = $_POST['name'];
        $updatedPhone = $_POST['mobile'];
        $email = $_POST['email'];

        $query = "UPDATE customer set C_fname = '$updatedName', C_contact = '$updatedPhone' WHERE C_email LIKE '$email'";

        if($result = $connection->query($query)){
            echo "Updated successfully";
            header("Location:billing.php");
        }else {
            echo "Error" .$connection->error;
        }
    }
?>

<?php
      include "footer.php";
?>

</body>
</html>


