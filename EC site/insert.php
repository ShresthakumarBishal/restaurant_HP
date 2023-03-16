<?php
require_once('connection.php');
//set date
$time=date('H:i:s'); 
$date=date('m/d/Y');

date_default_timezone_set("Asia/Kathmandu");
//echo "Asia/Kathmandu:".$time;

if (isset($_POST['login']))
{
  // set variables
  $username=$_POST['username'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  $adress=$_POST['adress'];
  $city=$_POST['city'];
  $ph_number=$_POST['ph_number'];

  //register users
  $sql="INSERT INTO users (username, password, email, ph_number, serial_no, adress, city) 
        VALUES ('$username', '$password', '$email', '$eoph_number', '$serial_no', '$adress', '$city')";

  if (mysqli_query($conn, $sql)) {
    $row=row_fetch_assoc(mysqli_query($conn, $sql));
    
  } else {
  echo "Error creating database: " . mysqli_error($conn);
  }
  mysqli_close($conn);
}

?>
