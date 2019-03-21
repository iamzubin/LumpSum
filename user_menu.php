<?php  
        require 'connect.php';
        $output = '';  
        $sql = "SELECT * FROM menu WHERE location=".$_SESSION["venture"].";";  
        $sql = "SELECT * FROM menu ;";  
        
        $result = mysqli_query($con, $sql);  
        $output .= '  
                      <div class="table-responsive">  
                        <table class="table alternate"> 
                        <tr>  
                        <th width="10%">Id</th>  
                        <th width="20%"> Name</th>  
                        <th width="20%"> location</th>  
                        <th width="20%">price</th>  
                        <th width="10%">Delete</th>  
                        </tr>';  
        if(mysqli_num_rows($result) > 0)  
        {  
          while($row = mysqli_fetch_array($result))      
            {  
                $output .= '  
                    
                <tr>  
                      <td>'.$row["id"].'</td>  
                      <td class="name" id="name-'.$row["id"].'" >'.$row["name"].'</td>  
                      <td class="location" id="'.$row["id"].'">'.$row["location"].'</td>  
                      <td class="price" id="'.$row["id"].'">'.$row["price"].'</td>  
                      <td><button type="button" onclick="add(this)" id="'.$row["id"].'" class="button small add_btn">+</button></td></tr>';  
          }  
        
     }  
     else  
     {  
          $output .= '<tr>  
                              <td colspan="4">Data not Found</td>  
                         </tr>';  
     }  
     $output .= '</table>  
    
    
          </div>';  
     
     echo $output;  
?>