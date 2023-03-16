<?php

$con = mysqli_connect('localhost','root','','productdb');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}
if(isset($_POST['remove'])) {
    $productid=$_POST['product_id'];

    $sql ="SELECT * FROM producttb where id ='$productid'";
    $result = mysqli_query($con, $sql);
    $row=mysqli_fetch_array($result);
    
    if($row) {
        $image_path=$row['product_image'];
        unlink ("$image_path");
        $sql1 ="DELETE FROM producttb where id ='$productid'";
        $result = mysqli_query($con, $sql1);
        echo "<script>alert('you have delete your product')</script>";
        header("Location: myprofile.php");
    }else{
        echo "image file hasnot deleted successfully !";
    }
    

}
?>