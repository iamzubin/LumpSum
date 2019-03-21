<?php
    require 'connect.php';
    // ob_clean();
    session_start();
    ob_start();
    // include('session.php');
    $name = $_POST["id"];
    $pass = $_POST["password"];
    // echo $name;
    // echo $pass;
    //echo var_dump($pass);
    $sql = mysqli_query($con,"SELECT * FROM admin WHERE name = '$name' and pass = '$pass';");
    $row = mysqli_fetch_array($sql);
    // $row = mysqli_fetch($sql);
    $num_row = mysqli_num_rows($sql);
    // echo $num_row;
        if($num_row > 0) {
            
            $_SESSION["name"] = $name;
            $_SESSION["venture"] = $name;
        //  echo var_dump($_SESSION);
        // echo $row["role"];
         //  header("location: logged.php");
        //  $row["role"]="vendor";
        switch($row["role"]){
            case "vendor":
                header("location: venture_edit.php");
                
                break;
            case "approve":
                header("location: approve.php");
                
                break;
            case "deliver":
                header("location: finalize.php");
                
                break;
                exit();
            }

                ob_flush();
    
      }else {
          header("location: admin_login.php"); 
        $error = "Your Login Name or Password is invalid";
        echo $error;
      }
?>