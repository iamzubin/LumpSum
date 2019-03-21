<?php  
        require 'connect.php';
        $output = '';  
        $sql = "SELECT * FROM menu WHERE location=".$_POST["venture"].";";  
        // $sql = "SELECT * FROM menu ;";  
        
        $result = mysqli_query($con, $sql);  
        if(mysqli_num_rows($result) > 0)  
        {  
          while($row = mysqli_fetch_array($result))      
            {  
                $output .= '<option value="'.$row["location"].'.">'.$row["location"].'</option>';  
          }  
        
     }  

     echo $output;  
?>