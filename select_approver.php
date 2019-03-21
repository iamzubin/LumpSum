<?php  
 require "connect.php";
 $output = '';  
 $sql = 'SELECT * FROM orders WHERE status="placed" ORDER BY id DESC ;';  
 $result = mysqli_query($con, $sql);  
 $output .= '  
 <div class="table-responsive">  
 <table class="table table-bordered">  
                <tr>  
                <th >Id</th>  
                <th >[ID - Vendor - Item - Price - Qty]</th> 
                     <th >phone</th>  
                     <th >price</th> 
                     <th >Name</th> 
                     <th >Address</th>
                     <th >paytm</th>  
                     <th >Approve?</th>  
                     </tr>'; 
                     if(mysqli_num_rows($result) > 0)  
                {  
                      while($row = mysqli_fetch_array($result))  
                      {  
                        //     $output .= var_dump($row); 
                            $output .= '  
                            <tr>  
                            <td>'.$row["id"].'</td>  
                            <td class="first_name" data-id1="'.$row["id"].'">'.$row["data"].'</td>  
                            <td class="last_name" data-id2="'.$row["id"].'" ><a href = "https://api.whatsapp.com/send?phone=91'.$row["phone"].'">'.$row["phone"].'</a></td>
                            <td class="last_name" data-id3="'.$row["id"].'" >'.$row["price"].'</td>   
                            <td class="last_name" data-id3="'.$row["id"].'" >'.$row["name"].'</td>   
                            <td class="last_name" data-id3="'.$row["id"].'" >'.$row["address"].'</td>       
                            <td class="last_name" data-id3="'.$row["id"].'" >'.$row["paytm"].'</td>                      
                     <td><button type="button" name="delete_btn" data-id5="'.$row["id"].'" class="btn btn-xs btn-danger btn_delete">approved</button></td>  
                     </tr>  
                     ';  
                  }  
                  $output .= '  
      ';  
}  
else  
 {  
      $output .= '<tr>  
      <td colspan="8">Data not Found</td>  
      </tr>';  
 }  
 $output .= '</table>  

 
      </div>';  
 echo $output;  
 ?>