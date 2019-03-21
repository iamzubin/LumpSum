<?php
ob_start();
require 'connect.php';
// session_destroy();
$name = $_POST["name"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$pass = $_POST["password"];
$ref = $_POST["referral"];

$sql = mysqli_query($con,"SELECT * FROM users WHERE email = '$email'");

$num_row = mysqli_num_rows($sql);
 
if($num_row > 0) {
    //session_register("myusername");
    echo "<script>alert('user already exist contact us for password reset');
    window.location='index.html'</script>";
    exit;
    
 }else {

$sql = "INSERT INTO users (name, phone, email, pass, ref) VALUES ('$name', '$phone', '$email', '$pass', '$ref')";
$msg = "Thank you for signing up on https://lumpsum.palashis.online ! \n\nLogin to your account and order now from your favorite vendors on campus! \n\nYour referral code is: ".$email."\nAsk people to use this code to get free deliveries!\nEvery new user signed up with your referral, gets YOU a delivery with NO CHARGE!\n\n\nBest,\nTeam LSD!";
$head = "From: lumpsum@palashis.online";
mail($email, "Welcome to Lump Sum Delivery!", $msg, $head);

 }
if(mysqli_query($con, $sql)){
    
    session_start();
    $_SESSION['email'] = $email;
    header("location: logged.php");
    ob_flush();
    // exit();
} else{
    header("location: index.php#signup");
    // echo "ERROR: Could not able to execute.
    // please us on call" . mysqli_error($link);

}
?>