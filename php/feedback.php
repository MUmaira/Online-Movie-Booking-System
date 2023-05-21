<?php 
  session_start();

  if(!isset($_SESSION['email'])){
    header("location:login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Feedback</title>
    <style>
      table {
        margin: 0 auto;
        border-radius: 0.5rem;
        border: #fbfbfb solid 3px;
        margin-bottom: 4rem;
      }

      th,td {
        padding: 1rem;
      }
      .update {
            text-decoration: none;
            padding: 0.3rem 1.5rem;
            background-color: #b6142c;
            color: #fbfbfb;
            border-radius: 0.5rem;
            margin-right: 30px;
      }

      .delete {
            text-decoration: none;
            padding: 0.3rem 1.5rem;
            background-color: #b6142c;
            color: #fbfbfb;
            border-radius: 0.5rem;
            margin-left: 30px;
      }
    </style>
    <!--Font awesome icons-->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
      integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="../css/nav.css" />
    <link rel="stylesheet" href="../css/feedback.css"></link>
    <script src="../js/nav.js" defer></script>


    <?php 
        //Including the header file
        require "header.php";
    ?>

  <section>
    <h1>Feedback</h1>
    <form class="feedback-form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
        <input type="text" name="name" placeholder="Full Name" autocomplete="off">
        <textarea name="feedback" cols="30" rows="10" placeholder="Feedback"></textarea>
        <button type="submit" name="submit">Send</button>
    </form>
  </section>

    <?php 
      //Adding the database connection file
      require "config.php";

      if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $feedback = $_POST['feedback'];
        //get the email of the customer using session variable
        $email = $_SESSION['email'];

        $query = "INSERT INTO fdata(name,email,feedback) VALUES('$name','$email','$feedback')";
        if(!$result = mysqli_query($connection,$query)){
          echo "Error " .$connection->error;
      }
        header("Location:feedback-success.php");
    } 
    ?>

      <table width=80% border="2px solid">
        <tr>
            <th>Name</th>
            <th>Feedback</th>
            <th>Update | Delete</th>
        </tr>

        <?php 
            //get the email using session variables
            $sessionEmail = $_SESSION['email'];
            $sql = "SELECT * FROM fdata WHERE email = '$sessionEmail'";
            
            if($result = $connection->query($sql)){
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        ?>
                    <tr>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['feedback'] ?></td>
                        <td><a class="update" href="feedbackUpdate.php?email=<?php echo $row['email'] ?>">Update</a>  <a class="delete" href="feedbackDelete.php?email=<?php echo $row['email']?>">Delete</a></td>
                    </tr>
        
        <?php 
                  }
                }
            }
        ?>
              
    </table>

    <?php 
        //Including the footer file
        require "footer.php";
    ?>