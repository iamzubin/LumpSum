<?php  
 require "connect.php";
 $vendor = $_POST['vendor'];
 $output = '';  
 $sql = 'SELECT * FROM orders WHERE status="approved" ORDER BY id DESC ;';  
 $result = mysqli_query($con, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="10%">Order Id</th>  
                     <th width="35%">[ID - Vendor - Item - Price - Qty]</th>
                     <th width="10%">Name</th>
                     <th width="15%">Prepared?</th>  
                </tr>'; 
$count = 0;
 if(mysqli_num_rows($result) > 0)  
 {  
    while($row = mysqli_fetch_array($result))  {  
        if(strpos($row["data"], $vendor) !== false) {
            $count++;
           $output .= '  
                <tr>  
                     <td>'.$row["id"].'</td>  
                     <td class="first_name" data-id1="'.$row["id"].'">'.$row["data"].'</td>           
                     <td class="first_name" data-id1="'.$row["id"].'">'.$row["name"].'</td>               
                     <td><button type="button" name="delete_btn" data-id5="'.$row["id"].'" class="btn btn-xs btn-danger btn_delete">Prepared.</button></td>  
                     </tr>  
                     ';  
        }  
        
    }
      $output .= '  
      ';  
 }  
 if($count==0)  
 {  
      $output .= '<tr>  
                          <td colspan="4">Data not Found</td>  
                     </tr>';  
 }  
 $output .= '</table>  


      </div>';  
 echo $output;  
 ?>