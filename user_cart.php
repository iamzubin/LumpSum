<?php  
 try{
 require 'connect.php';
 $sql = "INSERT INTO menu(id,name,price) VALUES('".$_POST["id"]."', '".$_POST["name"]."', '".$_POST["price"]."')";  
 if(mysqli_query($con, $sql))  
 {  
      echo 'Data Inserted';  
 }}  
catch(error $e){
    echo $e;
}
 ?> 