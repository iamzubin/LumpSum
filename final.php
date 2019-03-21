<?php
session_start();
// echo var_dump($_SESSION);
// echo var_dump($_POST);
require "connect.php";
// echo $_SESSION["email"];
$email = $_SESSION["email"];
$sql = mysqli_query($con,"SELECT * FROM users WHERE email = '$email';");
$row = mysqli_fetch_assoc($sql);
$name = $row["name"];
$phone = $row["phone"];

// echo $name;
$datas = " ";
foreach ($_SESSION["shopping_cart"] as $item) {
    //echo json_encode($item);
    $datas .= implode(" - ",$item);
    $datas .= "<br/>";
}
//echo $datas;
$sql = "INSERT INTO orders(email,name,phone ,address,paytm ,data ,price,status,requests) VALUES('".$_SESSION["email"]."','".$name."','".$phone." ','".$_POST["address"]."','".$_POST["paytm"]."','".$datas."',".$_SESSION["total"].", 'placed' ,'".$_POST["instruction"]."');"; 
//echo $sql; 
if(mysqli_query($con, $sql)){
    //echo "inserted";
    header("location: user_track.php");
}
echo mysqli_error($con);
?>