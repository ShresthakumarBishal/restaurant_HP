<?php
session_start();
require_once('connection.php');
/// for notification display
if (isset($_GET['view'])) {
$serial_id= $_SESSION['serial_no'];
if($_GET['view'] != '')
{
   $update_query = "UPDATE commenttb SET ViewStatus = 0 WHERE saler_id='$saler_id'";
   mysqli_query($con, $update_query);
}

// $con = mysqli_connect("localhost", "root", "", "notif");
$sql_noti="SELECT * FROM commenttb where saler_id='$saler_id' limit 5";
$result_noti=mysqli_query($con, $sql_noti);
$noti_count=mysqli_num_rows($result_noti);
$output = "";

if($noti_count> 0)
{
while($row=mysqli_fetch_array($result_noti))
{
   $product_id = $row['productId'];
   $user_username = $row['UserName'];
  $output .= "                                          
    <a href='productdetails.php?id=$product_id'>
   <strong>$user_username</strong><small><em> has Commented in Your Product On</em></small>
   </a>";
}
}
else{
    $output .= '<a href="#">No Noti Found</a>';
}
$status_query = "SELECT * FROM commenttb WHERE ViewStatus=1 and saler_id='$saler_id'";
$result_query = mysqli_query($con, $status_query);
$count = mysqli_num_rows($result_query);

//array form for json formate
$data = array(
   'notification' => $output,
   'unseen_notification'  => $count
);
echo json_encode($data);

}
?>
