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
        <h2>User Update Form</h2>
        <form action="" method="post">
          <fieldset>
            <legend>Personal information:</legend>
            First name:<br>
            <input type="text" name="first_name" value="<?php echo $first_name; ?>">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <br>
            Last name:<br>
            <input type="text" name="last_name" value="<?php echo $last_name; ?>">
            <br>
            Email:<br>
            <input type="email" name="email_address" value="<?php echo $email_address; ?>">
            <br>
            Phone Number:<br>
            <input type="int" name="phone_number" value="<?php echo $phone_number; ?>">
            <br>
            <br><br>
            <input type="submit" value="Update" name="update">
          </fieldset>
        </form> 
        </body>
        </html> 
    <?php
    } else{ 
        header('Location: view.php');
    } 
}
?> 