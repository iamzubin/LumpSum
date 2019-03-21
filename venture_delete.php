<?php 
require "connect.php";
$sql = "DELETE FROM menu WHERE id = ".$_POST["id"]." AND location = '".$_POST["venture"]."';"; 
// echo $sql;÷/

if(mysqli_query($con, $sql))  
 {  
     echo 'Data Deleted';  
    }

    // echo $e;

 ?>