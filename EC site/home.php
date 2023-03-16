<?php 
  $date= date("Y/m/d");

session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['username'])) {
	header('Location: index.php');
	exit;
}
//include php needed file
require_once('connection.php');
require_once('./php/component.php');

?>

<!DOCTYPE html>
<html lang="ja-JP">
<head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link type="text/css" rel="stylesheet" href="cart_style.css">

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
nav ul li sup {
    display: none;
    position: relative;
    top: -8px;
    left: -10px;
    padding: 5px 8px;
    border-radius: 50%;
    background: red;
    color: white;
}
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.show {
  display: block;
}

        </style>
</head>

<body>
        <!-----------sale button-->
<!--<a href="myprofile.php"> <button id="myBtn" title="Go to Add">sale</button></a>-->
<div class="navbar">
     <div class="logo"> <a href="home.php"> 
                    Hamro Bazar!
     </a></div>
                <div> <?php if(isset($_SESSION['username'])) { echo $_SESSION['username']; }?> </div>
                <nav>
                    <ul id="MenuItems">
                        <li><a href="myprofile.php" style="font-size: 20px;">My Profile</a></li>
                        <li class="dropdown">
                            <a href="#" onclick="myFunction()" class="dropbtn">Notification<sup id="sup"></sup></a>
                        
                            <div class="dropdown-content" id="myDropdown"></div>
                          
                        </li>
                        <li><a href="#"> cart </a></li>
                        <li><a href="contact.php"> About Us </a></li>
                        <li><a href="logout.php">logOut</a></li>
                    </ul>
                </nav>
                <i id="menu" class="fa fa-bars" onclick="menutoggle()">Menu</i>
</div>


<!--nav for category-------------->
<div class="shadow">
        <div class="small-contanier">
        <div class="row topnav">
            <h2>Categories :</h2>
          
              <select class="ctgy_nav" onchange="showCustomer(this.value)">
                    <option value="">Category :</option>
                    <option value="1">men</option>
                    <option value="2">female</option>
                    <option value="3">Bike</option>
                </select>
            <a onclick="showCustomer(1)"><b>Mele</b></a>
            <a onclick="showCustomer(2)">femle</a>
            <a onclick="showCustomer(3)">Bike</a>
            <a>other:
                <select onchange="showCustomer(this.value)">
                   <option value="">select One</option>
                    <option value="2">Mobile</option>
                    <option value="3">Furniture</option>
                </select>
            </a>
                <div class="search-container">
                    <form action="searchfile.php" method="POST">
                    <input type="text" placeholder="Search.." name="find">
                    <button type="submit" name="search"><i class="fa fa-search"></i></button>
                    </form>
                 </div> 
        </div>
        </div>
   </div>



</div>
   
<!-----Featured categories------->

  <!-----------featured product-------------->
    <div class="small-contanier">
         <br>

         <h2>Products</h2>
         <p>Sort BY :
              <select>
                  <option>Select One</option>
                  <option>Price cheap</option>
                  <option>Price Expensive</option>
                  <option>Avarage</option>
              </select>    
           </p>
       <div class="row">

        <?php

        $sql="SELECT * FROM producttb";
        $result=mysqli_query($con, $sql);

        while($row = mysqli_fetch_array($result)) {
            echo component($row['ProductName'], $row['ProductPrice'], $row['ProductImage'], $row['ID']);
        }

        ?>


       </div>
    </div>
 <!-----------------------title-->
    <div class="small-contanier">
        <div class="row row-2">
            <h2>Most Viwed Products</h2>
            <p>Sort BY :
              <select>
                  <option>Select One</option>
                  <option>Price cheap</option>
                  <option>Price Expensive</option>
                  <option>Avarage</option>
              </select>    
           </p>
        </div>
    </div>

<!-----------Most Viewed product-------------->
  <div class="small-contanier">
       <div class="row">

        <?php
        $sql="SELECT * FROM producttb ORDER BY views desc LIMIT 4";
        $result=mysqli_query($con, $sql);
        
        while($row = mysqli_fetch_array($result)) {
          echo component($row['ProductName'], $row['ProductPrice'], $row['ProductImage'], $row['ID']);
        }        ?>

       </div>

    </div>
    <hr>

   <!--footer------------------->
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
// for result disp;ay
function showCustomer(str) {
  var xhttp;  
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtHint").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "getresult.php?q="+str, true);
  xhttp.send();
}
     </script>


<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function load_unseen_notification(value='')
      {
        var xhttp;
        xhttp= new XMLHttpRequest();
        var d = value;
        xhttp.onreadystatechange = function(){
          if (this.readyState == 4 && this.status == 200) {
             var data = JSON.parse(this.responseText);

            document.getElementById("myDropdown").innerHTML = data.notification;

            if(data.unseen_notification > 0){
               document.getElementById("sup").innerHTML = data.unseen_notification;
            } else {
              document.getElementById("sup").style.display="none";
            }
          }
        };
      xhttp.open("GET", "notification.php?view="+d, true);
      xhttp.send();
      }

  load_unseen_notification(); // load notification function

// wwhen click notification, notification contents will display
function myFunction(){
    document.getElementById("myDropdown").classList.toggle("show");
    load_unseen_notification(value='yes');
}


</script>

</body>
</html>