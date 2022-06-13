<?php 
include "config.php";


  if (isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email_address = $_POST['email_address'];
    $phone_number = $_POST['phone_number'];
    $pass = $_POST['phone_number'];
    $sql = "INSERT INTO `records`(`first_name`, `last_name`, `email_address`, `phone_number`)
    VALUES ('$first_name','$last_name','$email_address','$phone_number')";
    $result = $conn->query($sql);
    if ($result == TRUE) {
        echo "<script>alert('Welcome to view');window.location.href='view.php'</script>";
    }else{
      echo "Error:". $sql . "<br>". $conn->error;
    } 

    $conn->close(); 

  }
?>