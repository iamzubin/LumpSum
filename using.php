<?php
require "connect.php";
session_start();
if(!$_SESSION["email"]){
    header("location: index.html#login");
}
//require "session.php";
// echo session_status();
// echo var_dump($_SESSION);
// echo $_SESSION["email"];
$email = $_SESSION["email"];
$sql = mysqli_query($con,"SELECT * FROM users WHERE email = '$email';");
$row = mysqli_fetch_assoc($sql);
$name = $row["name"];
$phone = $row["phone"];


?>
<?php   
 //session_start();  
 //require 'connect.php';
 if(isset($_POST["add_to_cart"]))  
 {  
   if(isset($_SESSION["shopping_cart"]))  
   {  
           $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");  
           if(!in_array($_GET["id"], $item_array_id))  
           {  
             $count = count($_SESSION["shopping_cart"]);  
             $item_array = array(  
               'item_id'               =>     $_GET["id"],  
               'item_venture'               =>     $_POST["hidden_ventu"],                       
               'item_name'               =>     $_POST["hidden_name"],  
               'item_price'          =>     $_POST["hidden_price"],  
               'item_quantity'          =>     $_POST["quantity"]  
              );  
              $_SESSION["shopping_cart"][$count] = $item_array;  
            }  
            else  
            {  
              echo '<script>alert("Item Already Added")</script>';  
              echo '<script>window.location="using.php"</script>';  
            }  
          }  
          else  
          {  
            $item_array = array(  
              'item_id'               =>     $_GET["id"],  
              'item_venture'               =>     $_POST["hidden_ventu"],                       
              'item_name'               =>     $_POST["hidden_name"],  
              'item_price'          =>     $_POST["hidden_price"],  
              'item_quantity'          =>     $_POST["quantity"] 
            );  
            $_SESSION["shopping_cart"][$count] = $item_array;  
          }  
        }  
        if(isset($_GET["action"]))  
        {  
          if($_GET["action"] == "delete")  
          {  
            foreach($_SESSION["shopping_cart"] as $keys => $values)  
            {  
              if($values["item_id"] == $_GET["id"])  
              {  
                unset($_SESSION["shopping_cart"][$keys]);  
                echo '<script>alert("Item Removed")</script>';  
                echo '<script>window.location="using.php"</script>';  
              }  
            }  
          }  
        }  
 ?>  

<html>
	<head>
		<title>Lump Sum Delivery</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> 		
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="shortcut icon" type="image/png" href="img/3d5f84e1-4ee4-df9f-9478-b8bb866bf2f4.webPlatform.png"/>
		<script src="js/user.js"></script>
    <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body>


		<!-- Wrapper -->
			<div id="wrapper">

						<!-- order -->
							<div id="order" style="width: 90%;" >
           <h3 align="center">your order goes here</h3><br />  
            <h4 align=center >select the vendor </h4>
           <form action="using.php">
           <select onchange="this.form.submit()" onfocus="this.selectedIndex = -1"; name="ventu">
             <?php
              if(!isset($_GET["ventu"])){
                $_GET["ventu"]="No Vendor Selected";
              }
              $que = 'SELECT DISTINCT location FROM menu;';
              $results = mysqli_query($con, $que);
              
              
              
              
              while($row = mysqli_fetch_array($results)){
                // echo var_dump($results);
                // echo '<option disabled label="">Select Vendor</option>';
                echo "<option";
                
                $sqli = 'SELECT * FROM venture WHERE venture="'.$row["location"].'";';
                // echo $sqli;
                $result1 = mysqli_query($con, $sqli);
                $row1 = mysqli_fetch_array($result1);
                // echo json_encode($row1);
                
                if($row1["status"] == "open"){
                  if($row["location"] == $_GET["ventu"]){
                    echo "  selected  ";
                  }  
                  echo ' value = "'.$row["location"].'"'; 
                  echo ">".$row["location"]."</option>";
                }
                else if($row1["status"] == "pre"){
                  if($row["location"] == $_GET["ventu"]){
                    echo "  selected  ";
                  }  
                  echo ' value = "'.$row["location"].'"'; 
                  echo ">".$row["location"]." preorder </option>";
                
                }
                else if($row1["status"] == "closed"){
                  // if($row["location"] == $_GET["ventu"]){
                    // echo "  selected  ";
                  // }  
                  echo ' disabled ';
                  echo ' value = "'.$row["location"].'"'; 
                  echo ">".$row["location"]." closed </option>";
                
                }
              }
           ?>
           </select>
           </form>
          
          
          
           <div class="container" style="width:100%;">  
                <?php  
                if(isset($_GET["ventu"])){
                  $query = "SELECT * FROM menu WHERE location = '".$_GET["ventu"]."';";
                  // echo $_GET["ventu"];
                }else{
                  $query = "SELECT * FROM menu";  
                }
                $result = mysqli_query($con, $query);  
                if(mysqli_num_rows($result) > 0)  
                {  
                  while($row = mysqli_fetch_array($result))  
                  {  
                    ?>  
                <div class="col-md-4">  
                     <form method="post" action="using.php?action=add&id=<?php echo $row["id"];?>&ventu=<?php echo $_GET["ventu"];?>">  
                          <div style="border:1px solid #333; background:#000000; border-radius:5px; padding:5%; width=25%;" align="center">  
                               <!-- <img src="<?php echo $row["image"]; ?>" class="img-responsive" /><br />   -->
                               <h4 class="text-info"><?php echo $row["name"]; ?></h4>  
                               <h4 class="text-danger">&#x20B9 <?php echo $row["price"]; ?></h4>  
                               <input type="text" name="quantity" class="form-control" value="1" style="width: 25%; text-align:center; border:1px solid #333;" />  
                               <input type="hidden" name="hidden_ventu" value="<?php echo $row["location"]; ?>" />                                 
                               <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />  
                               <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />  
                               <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add 	" />  
                          </div>  
                     </form>  
                </div>  
                <?php  
                     }  
                    }  
                    ?>  
                <div style="clear:both width"></div>  

                          <?php   
                          if(!empty($_SESSION["shopping_cart"]))  
                          {     
                            // echo var_dump($_SESSION);
                              echo '
                              <form action="final.php" method="post"><br />
                              <div class="feild feild-half">
                              <h4>Special Requests</h4>  
                              <input type="text" id ="istruct" name= "instruction" placeholder="Special knock?">
                              </div>
                              <br/>
                              <div class="feild feild-half">
                              <h4>Address</h4>  
                              <input type="text" id = "address" name= "address" required="required" placeholder="Room Number">
                              </div>
                              
                              
                              <br />
                              <div class="feild feild-half">
                              <h4>PayTm Transection ID</h4>  
                              <input type="text" id = paytm  name= "paytm" placeholder="Please PayTM 9971240137" >
                              </div>
                              <br/>
                              <h3>Order Details</h3>
                              <div class="table-responsive">  
                              <table class="table table-bordered">  
                              <tr>  
                              <th width="40%">Item Name</th>  
                              <th width="10%">Quantity</th>  
                              <th width="20%">Price</th>  
                              <th width="15%">Total</th>  
                              <th width="5%">Action</th>  
                              </tr> ';
                              $total = 0;  
                              foreach($_SESSION["shopping_cart"] as $keys => $values)  
                              {  
                                ?>  
                          <tr>  
                               <td><?php echo $values["item_name"]; ?></td>  
                               <td><?php echo $values["item_quantity"]; ?></td>  
                               <td>&#x20B9 <?php echo $values["item_price"]; ?></td>  
                               <td>&#x20B9 <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>  
                               <td><a href="using.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>  
                          </tr>  
                          <?php  
                                    $total = $total + ($values["item_quantity"] * $values["item_price"]);
                                    
                                  }  
                                  if($total>50){
                                    $deliv = $total*1.1;
                                  }else{
                                    $deliv = $total + 5;
                                  }
                                  $_SESSION["total"] = $deliv;
                                  ?>  
                          <tr>  
                               <td colspan="3" align="right">Total</td>  
                               <td align="left">&#x20B9 <?php echo number_format($total, 2); ?> + &#x20B9 <?php echo number_format($deliv - $total, 2); ?></td>  
                               <td align="right">&#x20B9 <?php echo number_format(floor($deliv)); ?></td>  
                               <tr>
                               <td colspan="4" align="right"></td>  
                               <td></td>  
                          </tr>  
                          <?php  
                          } 
                          ?>  

                     </table>
                     <center><button type="submit" value="submit">Place Order</button></center>
                    </form>
                </div>  
           </div>  
           <br />  
<center>
  <a href="logged.php"><button>back</button></a>
                        </center>
	  
          </div>
                                    
                         </div>

				<!-- Footer -->
					<footer id="footer">
						<p class="copyright"> Made By Ad-venture </p>
					</footer>

			</div>

		<!-- BG -->
			<div id="bg"></div>

		<!-- Scripts -->
		<script src="assets/js/jquery.min.js"></script>
		<script src="js/user.js"></script>
		<script src="assets/js/skel.min.js"></script>
		<script src="assets/js/util.js"></script>
		<script src="assets/js/main.js"></script>


	</body>
</html>