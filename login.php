<?php
    ob_start();    
    require 'connect.php';
   // include('session.php');
    $email = $_POST["id"];
    $pass = $_POST["password"];
    // echo $email;
    // echo $pass;
    //echo var_dump($pass);
    $sql = mysqli_query($con,"SELECT * FROM users WHERE email = '$email' and pass = '$pass';");
    //$row = mysqli_fetch_array($sql);
    $num_row = mysqli_num_rows($sql);
    // echo $num_row;
        if($num_row > 0) {
         
    session_start();
         $_SESSION["email"] = $email;
        //  echo var_dump($_SESSION);
        header("location: logged.php");
        ob_flush();
        // exit();
    
      }else {
         $error = "Your Login Name or Password is invalid";
           echo '"<script> alert("incorrect login")
            location.href= "index.html";
           </script>"';
      
        }

?>