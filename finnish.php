<?php  
 require 'connect.php'; 
 $id = $_POST["id"];  
 $sql = "UPDATE orders SET status='done' WHERE id='".$id."';";  
 if(mysqli_query($con, $sql))  
 {  
      echo 'Data Updated';  
 }  
 ?>