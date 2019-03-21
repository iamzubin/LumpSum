<?php  
 require 'connect.php'; 
 $id = $_POST["id"];  
 $sql = "UPDATE orders SET status='out for delivery' WHERE id='".$id."';";  
 if(mysqli_query($con, $sql))  
 {  
      echo 'Data Updated';  
 }  
 ?>