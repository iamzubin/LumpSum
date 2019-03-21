<?php
    
    require 'connect.php';
   // include('session.php');
    session_start();
    $email = $_POST["id"];
    $pass = $_POST["password"];
    // echo $email;
    // echo $pass;
    //echo var_dump($pass);
    $sql = mysqli_query($con,"SELECT * FROM venture WHERE venture = '$email' and pass = '$pass';");
    $row = mysqli_fetch_array($sql);
    // $row = mysqli_fetch($sql);
    $num_row = mysqli_num_rows($sql);
    // echo $num_row;
        if($num_row > 0) {
         
         $_SESSION["email"] = $email;
         $_SESSION["venture"] = $row["venture"];
        //  echo var_dump($_SESSION);
         header("location: venture_edit.php");
        
        exit();
    
      }else {
         $error = "Your Login Name or Password is invalid";
         echo '<script>alert("'.$error.'")</script>';
         echo '<script>window.location = "venture_login.php"</script>';
        //  echo $error;
      }



?>