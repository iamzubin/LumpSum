<?php  
 require "connect.php";
 try{
 $sql = "INSERT INTO menu( name, price, location) VALUES( '".$_POST["name"]."', '".$_POST["price"]."', '".$_POST["venture"]."');";  
//  echo $sql;
 if(mysqli_query($con, $sql))  
 {  
      echo 'Data Inserted';  
 } else{
    //  echo mysqli_error();
    echo "error";
 }
 
     
 }
 catch(Exception $e){
     echo $e;
 }
 ?> 