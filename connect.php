<?php
    // A simple PHP script demonstrating how to connect to MySQL.
    // Press the 'Run' button on the top to start the web server,
    // then click the URL that is emitted to the Output tab of the console.

    $servername = "localhost";
    $username = "iamzubin_contact";
    $dbpassword = "hello@123";
    $database = "iamzubin_contact";
    $dbport = 3306;


$con = mysqli_connect("localhost:3306",$username,$dbpassword,$database);


// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>