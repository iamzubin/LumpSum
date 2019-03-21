<?php  
 require 'connect.php'; 
 $id = $_POST["id"];
 $sql1 = "SELECT * FROM orders WHERE id='".$id."';";
 $row = mysqli_fetch_array(mysqli_query($con,$sql1));
 $p = "placed";
 if($row["status"] == $p){
 $sql = "UPDATE orders SET status='deleted' WHERE id='".$id."';";  
 if(mysqli_query($con, $sql))  
 {  
    // echo $sql;
    echo 'Data Updated';  
    // echo var_dump($row);
}  
else{
    echo 'Some error occured';
    }
}
else{
    // echo $p;
    // echo $row["status"];
    echo "sorry can't cancel after approval";
}
 ?>