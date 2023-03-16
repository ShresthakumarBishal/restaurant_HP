<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();

//include php needed file
require_once('connection.php');
require_once('./php/component.php');

if(isset($_GET['id'])) {
    
     $id=$_GET['id'];
     $id=mysqli_real_escape_string($con, $id);
     $id=htmlentities($id);
     $sql_count="SELECT * FROM producttb where id='$id'"; 
     $ress=mysqli_query($con, $sql_count) or die (mysqli_error());
     $count=mysqli_num_rows($ress);
  if($count>0){ 
        while($row=mysqli_fetch_array($ress)) {
            $views=$row['views'];
            $sql_count="UPDATE producttb SET views=$views+1 where id='$id'";
            $res=mysqli_query($con, $sql_count);}
    }

} else {

        header('Location: index.php');
        exit;
 }
     ?>
  

<!DOCTYPE html>
<html>
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
    <style>

.prev, .next {
    cursor: pointer;
    position: absolute;
    top: 40%;
    width: auto;
    padding: 16px;
    margin-top: -22px;
    color: red;
    font-weight: bold;
    font-size: 18px;
    transition: 0.6s ease;
    border-radius: 0 3px 3px 0;
    user-select: none;
  }
/* Position the "next button" to the right */
.next {
    right: 50%;
    border-radius: 3px 0 0 3px;
  }
  
  /* On hover, add a black background color with a little bit see-through */
  .prev:hover, .next:hover {
    background-color: rgba(0,0,0,0.8);
  }

        /* media query for productdetails*/
        @media only screen and (max-width: 700px) {
            .single-product .row {
                display: flex;
            }
            .single-product .col-2 {
                flex: 100%;
                padding: 0px 0;
            }
            .single-product h1 {
                font-size: 26px;
                line-height: 22px;
            }
            .btn {
                font-size: 3vw;
            }
            .small-contanier {
                 width: 99%;
               margin: 2px;
                padding-left: 2px;
                padding-right: 2px;
            }
            .prev, .next {
               top: 20%;

             }
            .next {
                right: 5px;
                border-radius: 3px 0 0 3px;
             }
        }
    </style>
</head>

<body>
<div class="navbar">
     <div class="logo"> <a href="index.php"> 
                    Hamro Bazar!
                    </a></div>
                <nav>
                    <ul id="MenuItems">
                        <li><a href="index.php"><i class="fa fa-home"></i>Home</a></li>
                        <li><a href="myprofile.php">My Profile</a></li>
                        <li><a href="logout.php">logOut</a></li>
                        <li><a href="">Notification</a></li>
                        <li><a href="cart.php">My cart </a></li>
                    </ul>
                </nav>
                <i id="menu" class="fa fa-bars" onclick="menutoggle()"></i>
        </div>
        
    
<!----------single product detail-->
        <?php
      
        $sql="SELECT * FROM producttb where id=$id";
        $result=mysqli_query($con, $sql);
                
        while($row = mysqli_fetch_array($result)) {
            echo productdetails($row['product_name'], $row['product_price'], $row['product_image'], $row['id'], $row['views']);
        }

       ?>
       <hr>
       <hr>
    <!--title-->
    <div class="small-contanier">
        <div class="row row-2">
            <h2>Related Products</h2>
            <p>View more</p>
        </div>
  <!--releted product-->
  <div class="row">
      <?php
        $sql="SELECT * FROM producttb";
        $result=mysqli_query($con, $sql);
        
        while($row = mysqli_fetch_array($result)) {
            echo component($row['product_name'], $row['product_price'], $row['product_image'], $row['id']);
        }

        ?> 
        </div>  
    
<!-------------footer--------------->  
    <div class="comment">
       <form action="" method="POST">
         <label>Message</label><br>
         <textarea name="msg" placeholder="Type your text here..."></textarea>
       </form>
    </div>

   <!--footer-->
    <div class="footer">
    <div class="container">
        <div class="row">
            <div class="footer-col-1">
                <h4>about me</h4>
                <p>this web side for you</p>
            </div>
            <div class="footer-col-1">
                <h4>Custamer</h4>
                <p>custamer yygygtytyt gfyty <br><strong> HaMro BaZar</strong></p>
            </div>
            <div class="footer-col-1">
                <h4>contact Me</h4>
                <p><strong> HaMro BaZar</strong></p>
            </div>
        </div>
        <hr>
            <p class="copy">Copyright 2020 -simple</p>
    </div>
    </div>
    
<!--js for toggle menu  -------->
<script>
function menutoggle() {
  var MenuItems= document.getElementById("MenuItems");
  
  if (MenuItems.style.display == "none") {
    MenuItems.style.display = "block";
  } else {
    MenuItems.style.display = "none";
  }
}

     </script>

    <!--js for skide imge -------->
    <script>
        var ProductImg = document.getElementById("ProductImg");
        var SmallImg = document.getElementByClassName("small-img");

        SmallImg[0].onclick = function(){
            ProductImg.src = SmallImg[0].src;
        }
        SmallImg[1].onclick = function(){
            ProductImg.src = SmallImg[1].src;
        }
        SmallImg[2].onclick = function(){
            ProductImg.src = SmallImg[2].src;
        }
        SmallImg[3].onclick = function(){
            ProductImg.src = SmallImg[3].src;
        }
    </script>

</body>
</html>