<?php
 session_start();
 //include php needed file
include('connection.php');
require_once('./php/component.php');


// Remove items from cart
if(isset($_POST['remove'])) {
  if($_GET['action']=='remove') {
    foreach($_SESSION['cart'] as $key=>$value){
       if($value['product_id']==$_GET['id']){
         unset($_SESSION['cart'][$key]);
         echo "<script>alert('product has been Remove by')</script>";
         echo "<script>window.location='cart.php'</script>";
        }
    }
  }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <!--font family for all body element-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:
    wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="/project/cart_style.css">
     
    <!--font awesome css emoji BootstrapCDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Cart</title>
</head>
<body>



<div class="small-contanier">
         <h2>Products</h2>
       <div class="row">
         
         <?php

         $total=0;

         if(isset($_SESSION['cart'])) {
          $product_id =array_column($_SESSION['cart'], 'product_id');

          while($row = mysqli_fetch_array($result)) {
            foreach($product_id as $id) {
              if($row['id']==$id) {
                echo cart($row['product_name'], $row['product_price'], $row['product_image'], $row['id']);
                $total = $total+(int)$row['product_price'];
              }
            }    
            
          }
        }else {
          echo "<h5>Cart Is Empty</h5>";
        } 
         ?>

 <!-------Total calculation table--->
       </div>

       <div>
          <h6>Products DETAIL</h6>
          <hr>
          <div class="total-price">
            <div>
              In Your Cart, You have 

              <?php
                  if(isset($_SESSION['cart'])) {
                    $count = count($_SESSION['cart']);
                    echo "<h6>($count items)</h6>";
                  }else {
                    echo "<h6>(0 Items)</h6>";
                  }
              ?>


            <table>
                <tr>
                    <td>SubTotal</td>
                    <td>Rps <?php echo $total; ?></td>
                </tr>
                <tr>
                    <td>Tax</td>
                    <td>Rps 10
                      <?php $tax = 10; ?></td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td>Rps<?php echo $total+$tax; ?></td>
                </tr>
            </table>
        </div>

       </div>
</div>
</body>
</html>