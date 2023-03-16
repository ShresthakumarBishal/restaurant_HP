
<?php
session_start();
    require_once('connection.php');
    require_once('./php/component.php');

if(isset($_GET['q'])){
    $category_q = intval($_GET['q']);


    $sql="SELECT * FROM producttb where CategoryId='$category_q'";
    $result=mysqli_query($con, $sql);

    while($row = mysqli_fetch_array($result)) {
        echo component($row['ProductName'], $row['ProductPrice'], $row['ProductImage'], $row['id']);
    }

}

if(isset($_GET['r'])){
    $search = intval($_GET['r']);

    $sql="SELECT * from producttb where product_name like '$search%'";
    $result=mysqli_query($con, $sql);

    while($row = mysqli_fetch_array($result)) {
        echo component($row['product_name'], $row['product_price'], $row['product_image'], $row['id']);
    }
}

// add to comment and notifi///////////////////////////

if(isset($_POST['cmmt-submit'])){
    $date= date("Y/m/d");
    $status=1;
    $product_id=$_POST['product_id'];
    $saler_id=$_POST['saler_id'];
    $user_username=$_SESSION['username'];
   
    $user_id=$_SESSION['serial_no'];
    $cmmt_input=$_POST['cmmt-input'];
   if($saler_id==$user_id){
            $status=0;
        }
    $insert_sql="INSERT INTO commenttb (SalerId, ProductId, CommentContent, UserId, UserName, ViewStatus, DateTime) VALUE ('$saler_id, '$product_id', '$cmmt_input', '$user_id'), '$user_username', '$status', '$date'";
    $result2=mysqli_query($con,  $insert_sql);
    if($result2) {
            header("location: productdetails.php?id=$product_id");
          } 
}

/// for notification display

if(isset($_GET['view'])){
    $saler_id= $_SESSION['serial_no'];

if($_POST["view"] == 'yes')
{
   $update_query = "UPDATE commenttb SET ViewStatus = 0 WHERE saler_id='$saler_id'";
   mysqli_query($con, $update_query);
}
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

/// for like 
if (isset($_POST['like'])){
    header("Content-Type: application/json; charset=UTF-8");
    $obj = json_decode($_POST["like"], true);  
    $product_id =$obj["product_id"];
    if(isset($_SESSION['serial_no'])) {
        $user_id= $_SESSION['serial_no'];
        $username= $_SESSION['username'];
    
        if(isset($obj["liked"])) {
            $insert_sql="INSERT INTO liketb (ProductId, UserId, UserName, DateTime) 
                 VALUE ('$product_id', '$user_id', '$username', '$date')";
            $result_insert = mysqli_query($con, $insert_sql);
        }
    }
    $like_sql="SELECT * FROM liketb where productId ='$product_id'";
    $like_result = mysqli_query($con, $like_sql);
    $like_count = mysqli_num_rows($like_result);
    if($like_count > 0) {
        echo $like_count;
    }

}

?>
