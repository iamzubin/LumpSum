<?php  
 require "connect.php";
 $output = '';  
 $sql = 'SELECT * FROM orders WHERE status="out for delivery" ORDER BY id DESC ;';  
 $result = mysqli_query($con, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th >Order Id</th>  
                     <th >[ID - Vendor - Item - Price - Qty]</th> 
                     <th >Name</th>   
                     <th >Phone</th>   
                     <th >Address</th>  
                     <th >Price</th>   
                     <th >Done?</th>  
                </tr>';  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = 

mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td>'.$row["id"].'</td>  
                     <td class="first_name" data-id1="'.$row["id"].'">'.$row["data"].'</td>  
                     <td class="first_name" data-id1="'.$row["id"].'">'.$row["name"].'</td>  
                     <td class="last_name" data-id2="'.$row["id"].'" ><a href = "https://api.whatsapp.com/send?phone=91'.$row["phone"].'">'.$row["phone"].'</a></td>  
                     <td class="first_name" data-id1="'.$row["id"].'">'.$row["address"].'</td>    
                     <td class="first_name" data-id1="'.$row["id"].'">'.$row["price"].'</td>                     
                     <td><button type="button" name="delete_btn" data-id5="'.$row["id"].'" class="btn btn-xs btn-danger btn_delete">Done.</button></td>  
                     </tr>  
                     ';  
                    }  
      $output .= '  
      ';  
 }  
 else  
 {  
      $output .= '<tr>  
                          <td colspan="6">Data not Found</td>  
                     </tr>';  
 }  
 $output .= '</table>  


      </div>';  
 echo $output;  
 ?>