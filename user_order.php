<?php  
        require 'connect.php';
        $output = '';  
        $email = $_POST["email"];
        // $sql1 = mysqli_query($con,"SELECT * FROM users WHERE email = '$email';");
        // $row1 = mysqli_fetch_assoc($sql);
        $sql = "SELECT * FROM orders WHERE email='".$email."';";  
        // $sql = "SELECT * FROM orders;";          
        $result = mysqli_query($con, $sql);  
       
        $output .= '  
                      </br>
                      </br>
                      <h2>your orders here</h2>
                      <div class="table-responsive">  
                        <table class="table table-bordered">  
                        <tr>  
                        <th >Order Id</th>  
                        <th >Address</th>  
                        <th >[ID - Vendor - Item - Price - Qty]</th>  
                        <th >Amount</th>  
                        <th >Status</th>  
                        <th >Cancel?</th>  
                        </tr>';  
        if(mysqli_num_rows($result) > 0)  
        {  
          while($row = mysqli_fetch_array($result))      
            {  
                
                // $order = explode("-",$row["data"]);
                  // echo json_encode($order);  
                  
                


                $output .= '  
                  <tr>  
                  <td>'.$row["id"].'</td>  
                  <td  data-id2="'.$row["address"].'" >'.$row["address"].'</td>  
                  <td  data-id4="'.$row["data"].'" align = "center" >'.$row["data"].'</td>  
                  <td  data-id7="'.$row["price"].'" >'.$row["price"].'</td>  
                  <td  data-id6="'.$row["status"].'">'.$row["status"].'</td>
                  <td><button type="button" name="delete_btn" data-id5="'.$row["id"].'" class="btn btn-xs btn-danger btn_delete">Cancel.</button></td>';                }  
        
     }  
     else  
     {  
          $output .= '<tr>  
                              <td colspan="6">No Orders Found</td>  
                         </tr>';  
     }  
     $output .= '</table>  
    
    
          </div>';  
     
     echo $output;  
?>