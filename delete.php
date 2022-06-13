<?php 


include "config.php"; 


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM `records` WHERE `id`='$id'";
    $result = $conn->query($sql);
    if ($result == TRUE) {
        echo "<script>alert('The record has been successfully deleted.');window.location.href='view.php'</script>";
    }else{
      echo "Error:". $sql . "<br>". $conn->error;
    } 
} 
?>