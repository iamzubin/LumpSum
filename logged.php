<?php
ob_start();
session_start();
require "connect.php";
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
<html>
	<head>
        <title>Lump Sum Delvery</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
		<script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>

        </head>
        <body>

            
            <!-- Wrapper -->
			<div id="wrapper">
                
                <!-- Header -->
                <header id="header">
                    <div class="logo">
                        <span><a href="logout.php" style="text-decoration:none;"><i class="icon fa-diamond"></i></a></span>
                        </div>
						<div class="content">
							<div class="inner">
                                <h1>Hello <?= $name?></h1>
                                <p>Your Referral code is <a href="mailto:<?php echo $email?>"><?= $email?></a> <br> we'll text(whatsapp) you on <a href="tel:<?= $phone?>"><?= $phone?>
                                </a>
                                <br/>
                                <?php
                                if($row["ref"]){
                                    echo 'refered by '.$row["ref"];
                                }
                                ?></p>
							</div>
                            </div>
						<nav>
                            <ul>
								<li><a href="using.php">Order</a></li>
								<li><a href="user_track.php">Track</a></li>
							</ul>
                            </nav>
					</header>
                    
                    <!-- Main -->
					<div id="main">

                        <!-- track -->
						
                        <article id="track">
                            </article>
                            
						<!-- order -->
                        <article id="order">
                            </article>
                            
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
		
            
            
            <script>  
 $(document).ready(function(){  
      function fetch_data()  
      {  
           $.ajax({  
                url:"user_order.php",  
                method:"POST",  
                success:function(data){  
                     $('#live_data').html(data);  
                }  
           });  
      }  
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
           $.ajax({  
                url:"insert.php",  
                method:"POST",  
                data:{first_name:first_name, last_name:last_name},  
                dataType:"text",  
                success:function(data)  
                {  
                     alert(data);  
                     fetch_data();  
                }  
           })  
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
           var id=$(this).data("id3");  
           if(confirm("Are you sure you want to delete this?"))  
           {  
                $.ajax({  
                     url:"delete.php",  
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

			
			<script src="assets/js/skel.min.js"></script>
            <script src="assets/js/util.js"></script>
            <script src="assets/js/main.js"></script>
            
            
        </body>
        </html>