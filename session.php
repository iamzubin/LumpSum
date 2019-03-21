<?php
   include('connect.php');
   require 'connect.php';
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($con,"SELECT * FROM admin WHERE Id = '$user_check' ");

   $row = mysqli_num_rows($ses_sql);
   
   $login_session = $row['username'];

?>
