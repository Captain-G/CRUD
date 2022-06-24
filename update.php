<?php 
include "config.php";


    if (isset($_POST['update'])) {
        $first_name = $_POST['first_name'];
        $id = $_POST['id'];
        $last_name = $_POST['last_name'];
        $email_address = $_POST['email_address'];
        $phone_number = $_POST['phone_number'];
        $sql = "UPDATE `records` 
        SET `first_name`='$first_name',`last_name`='$last_name',`email_address`='$email_address',`phone_number`='$phone_number' 
        WHERE `id`='$id'"; 
        $result = $conn->query($sql); 
        if ($result == TRUE) {
            echo "<script>alert('Record has been successfully updated.');window.location.href='view.php'</script>";
        }else{
          echo "Error:". $sql . "<br>". $conn->error;
        } 
    } 
if (isset($_GET['id'])) {
    $id = $_GET['id']; 
    $sql = "SELECT * FROM `records` WHERE `id`='$id'";
    $result = $conn->query($sql); 
    if ($result->num_rows > 0) {        
        while ($row = $result->fetch_assoc()) {
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $email_address = $row['email_address'];
            $phone_number  = $row['phone_number'];
            $id = $row['id'];
        } 
    ?>
       <head>
          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>Document</title>
          <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
          <!-- <link rel="stylesheet" href="form.css"> -->
        </head>
        <body style="max-width: 600px; margin:auto">
        <div class="content my-5" style="font-family: Garamond, serif">
        <h2>User Update Form</h2>
        <form action="" method="post">
          <fieldset>
            <legend>Personal information:</legend>
            <div class="form-group">
            First name:<br>
            <input type="text" name="first_name" class="form-control" value="<?php echo $first_name; ?>">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            </div>
            <div class="form-group">
            Last name:<br>
            <input type="text" name="last_name" class="form-control" value="<?php echo $last_name; ?>">
            </div>
            <div class="form-group">
            Email:<br>
            <input type="email" name="email_address" class="form-control" value="<?php echo $email_address; ?>">
            </div>
            <div class="form-group">
            Phone Number:<br>
            <input type="int" name="phone_number" class="form-control" value="<?php echo $phone_number; ?>">
            </div>
            <div class="form-group">
            <input type="submit" value="Update" name="update" class="btn btn-primary">
            </div>
          </fieldset>
        </form> 
      </div>
        </body>

        <!-- <!DOCTYPE html>
        <html lang="en">
        <head>
          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <title>Document</title>
          <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
          <link rel="stylesheet" href="form.css">
        </head>
        <body>
        <div class="content my-5">


        <form action="" method="post" autocomplete="off">
          <div class="form-group">
          <label>First name</label>
          <input type="text" class="form-control" name="first_name" value="<?php echo $first_name; ?>">
          <input type="hidden" class="form-control" name="id" value="<?php echo $id; ?>">
          </div>
          <div class="form-group">
          <label>Last name</label>
          <input type="text" class="form-control" name="last_name" value="<?php echo $last_name; ?>">
          <input type="hidden" class="form-control" name="id" value="<?php echo $id; ?>">
          </div>
          <div class="form-group">
          <label>Email address</label>
          <input type="text" class="form-control" name="email_address" value="<?php echo $email_address; ?>">
          <input type="hidden" class="form-control" name="id" value="<?php echo $id; ?>">
          </div>
          <div class="form-group">
          <label>Phone number</label>
          <input type="text" class="form-control" name="phone_number" value="<?php echo $phone_number; ?>">
          <input type="hidden" class="form-control" name="id" value="<?php echo $id; ?>">
          </div>
      
      
          <button type="submit" class="btn btn-primary" name="update" value="Submit">Submit</button>

        </div>

    </form>
          
        </body>
        </html> -->

        



       
  
  </body>
</html> 

    <?php
    } else{ 
        header('Location: view.php');
    } 
}
?> 