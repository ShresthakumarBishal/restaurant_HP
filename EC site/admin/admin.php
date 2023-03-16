<?php 

//shart session
session_start();

//include php needed file
require_once('../connection.php');
require_once('../php/component.php');
?>
<!DOCTYPE html>
<html lang="ne-NP">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="cart_style.css">


        <!--font family for logo element-->
         <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
 
        <!--font family for all body element-->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=
        Padauk:wght@400;700&display=swap" rel="stylesheet">
        
        <!--font awesome css emoji BootstrapCDN-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>
         Hamro Bazar ! 
    </title>
    <style>

    </style>
</head>

<body>
     <div class="navbar">
                <div class="logo">
                    Hamro Bazar!
                </div>
                
                <nav>
                    <ul id="MenuItems">
                        <li><a href="index.php"><i class="fa fa-home"></i>Home</a></li>
                        <li><a href="">Home</a></li>
                        <li><a href="registration.php">login</a></li>
                        <li><a href="cart.php">cart
                        <?php
                             if(isset($_SESSION['cart'])){
                                 $count =count($_SESSION['cart']);
                                 echo"<span>$count</span>";
                             }else{
                                echo"<span>0</span>"; 
                             }
                        ?>
                        </a></li>
                    </ul>
                </nav>
                <i id="menu" class="fa fa-bars" onclick="menutoggle()">Menu</i>
    </div>

    <div class="container">
            <div class="row">
                <div class="col-4">
                    Total Views<br>
                    22
                </div>
                <div class="col-4">
                    Total registered<br>
                    22
                </div>
                <div class="col-4">
                    Total <br>
                    22
                </div>
            </div>
        <button>Customers</button> 
           <select onchange="show(this.value)">
             <option value="0">Customers Number</option>
             <option value="1">Customers Name</option>
             <option value="3">Phone Number</option>
           </select>
           <input type="text"><br>
        <button>Payment</button><br>
        <button>Views</button><br>
        <button>order</button><br>
    <hr>
    <div id="display">
            Result will be shown here.....
    </div>
    </div>

</body>
</html>