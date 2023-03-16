<?php
//include php needed file
require_once('connection.php');
require_once('./php/component.php');
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
    
    <link rel="stylesheet" href="cart_style.css">
  
     
    <!--font awesome css emoji BootstrapCDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>
         Hamro Bazar ! Products 
    </title>
</head>
<body>
          <!-----------Most Viewed product-------------->


        <?php
        $q=$_GET['q'];
        $sql="SELECT * FROM producttb order by product_price $q";
        $result=mysqli_query($con, $sql);
        
        while($row = mysqli_fetch_array($result)) {
            echo component($row['product_name'], $row['product_price'], $row['product_image'], $row['id']);
        }        ?>


</body>
</html>



