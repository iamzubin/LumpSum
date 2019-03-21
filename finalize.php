<?php
require "connect.php";
session_start();
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
		<title>Lump Sum Delvery</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> 		
		<link rel="stylesheet" href="assets/css/main.css" />
		<script src="js/user.js"></script>
    <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	<script>
	    
      function fetch_data()  
      {  
           $.ajax({  
                url:"select_finalize.php",  
                method:"POST",  
                success:function(data){  
                     $('#live_data').html(data);  
                }  
           });  
      }  
	    
	</script>
	</head>
  <body style="padding:5%;">
      <div align="center"><button onclick="fetch_data()">Refresh Table</button></div>
<br/><br/>
<div id="live_data">
</div>
<script src="assets/js/jquery.min.js"></script>
<script>  
 $(document).ready(function(){  
      fetch_data();  
      $(document).on('click', '#btn_add', function(){  
           var first_name = $('#first_name').text();  
           var last_name = $('#last_name').text();  
           if(first_name == '')  
           {  
                alert("Enter First Name");  
                return false;  
           }  
           if(last_name == '')  
           {  
                alert("Enter Last Name");  
                return false;  
           }  
  
      });  
      function edit_data(id, text, column_name)  
      {  
           $.ajax({  
                url:"edit.php",  
                method:"POST",  
                data:{id:id, text:text, column_name:column_name},  
                dataType:"text",  
                success:function(data){  
                     alert(data);  
                }  
           });  
      }  
      $(document).on('blur', '.first_name', function(){  
           var id = $(this).data("id1");  
           var first_name = $(this).text();  
           edit_data(id, first_name, "first_name");  
      });  
      $(document).on('blur', '.last_name', function(){  
           var id = $(this).data("id2");  
           var last_name = $(this).text();  
           edit_data(id,last_name, "last_name");  
      });  
      $(document).on('click', '.btn_delete', function(){  
           var id=$(this).data("id5");  
           if(confirm("Are you sure?"))  
           {  
                $.ajax({  
                     url:"finnish.php",  
                     method:"POST",  
                     data:{id:id},  
                     dataType:"text",  
                     success:function(data){  
                          alert(data);  
                          fetch_data();  
                     }  
                });  
           }  
      });  
 });  
 </script>     
</body>
 </script>     

		<script src="assets/js/skel.min.js"></script>
		<script src="assets/js/util.js"></script>
		<script src="assets/js/main.js"></script>


	</body>
</html>