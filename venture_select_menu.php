<?php  
        require 'connect.php';
        $output = '';  
        // $_POST["venture"] = "kk";
        $sql = "SELECT * FROM menu WHERE location='".$_POST["venture"]."';";  
        // $sql = "SELECT * FROM menu ;";  
        
        $result = mysqli_query($con, $sql);  
        $output .= '  
                      <div class="table-responsive">  
                        <table class="table table-bordered">  
                        <tr>  
                        <th width="10%">Id</th>  
                        <th width="20%"> Name</th>  
                        <th width="20%"> price</th>  
                        <th width="10%">Delete</th>  
                        </tr>';  
        $total = mysqli_num_rows($result);
        if($total > 0)  
        {  
          while($row = mysqli_fetch_array($result))      
            {  
                $output .= '  
                    
                <tr>    
                      <td>'.$row["id"].'</td>  
                      <td class="name" data-id1="'.$row["name"].'" >'.$row["name"].'</td>  
                      <td class="price" data-id2="'.$row["price"].'" >'.$row["price"].'</td>  
                      <td><button type="button" name="delete_btn" data-id3="'.$row["id"].'" class="btn btn-xs btn-danger btn_delete" style="padding:0;height:50%;width:50%;">x</button></td></tr>';  
          }  
        
     }  
     else  
     {  
          $output .= '<tr>  
                              <td colspan="4">Data not Found</td>  
                         </tr>';  
     }  
     $output .= '  
    <tr>  
         <td id="add_id"></td>  
         <td id="add_name" contenteditable></td>  
         <td id="add_price" contenteditable></td>  
         <td><button type="button"  id="btn_add" class="btn btn-xs btn-success"  style="padding:0; width:50%;height:50%;">+</button></td>  
    </tr> ';  
     $output .= '</table>  
    
    
          </div>';  
    $output .= '<div>
        Total items: '.$total.'
    </div>';
     
     echo $output;  
?>