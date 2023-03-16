<?php 

//shart session
session_start();

//include php needed file
require_once('connection.php');
require_once('./php/component.php');
if (isset($_SESSION['username'])) {
	header('Location: home.php');
	exit;
}
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
    #myBtn {
        display:none;
    }
    .topnav a {
        cursor: pointer;
    }
     @media only screen and (max-width: 700px) {
                    #myBtn {
            display: block; /* Hidden by default */
            position: fixed; /* Fixed/sticky position */
            bottom: 20px; /* Place the button at the bottom of the page */
            right: 30px; /* Place the button 30px from the right */
            z-index: 99; /* Make sure it does not overlap */
            border: none; /* Remove borders */
            outline: none; /* Remove outline */
            background-color: red; /* Set a background color */
            color: white; /* Text color */
            cursor: pointer; /* Add a mouse pointer on hover */
            padding: 15px; /* Some padding */
            border-radius: 10px; /* Rounded corners */
            font-size: 18px; /* Increase font size */
            }

            #myBtn:hover {
            background-color: #555; /* Add a dark-grey background on hover */
            }
    }

</style>
</head>

<body>
        <!-----------sale button-->
   <a href="myprofile.php"> <button id="myBtn" title="Go to Add">sale</button></a>


     <div class="navbar">
     <div class="logo"> <a href="index.php"> 
                    Hamro Bazar!
                    </a></div>
                
                <nav>
                    <ul id="MenuItems">

                        <form action="login.php" method="POST">
                        <li><input type="text" name="username" placeholder="Your Name/shop Name*"></li>
                        <li><input type="password" name="password" placeholder="Your Password*"></li>
                        <li><input type="submit" name="submit" value="Login"></li>
                        </form>

                        
                    </ul>
                </nav>
                <a href="registration.php"><button>Register</button></a>
                <button id="menu" onclick="menutoggle()">Login</button>
             
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
                    <input type="text" placeholder="Search.." name="find" onkeyup="search(this.value)">
                    <button type="submit" name="search"><i class="fa fa-search"></i></button>
                    </form>
                 </div> 
        </div>
        </div>
   </div>

</div>

 

    <div class="header">
        <div class="container">
            <div class="row" id="txtHint">
                <div class="col-2">
                    <h1>Give Me Your <br>Time</h1>
                    <p>買い物をこっち</p>
                    <a href="" class="btn">Explore Now &#8811</a>
                </div>
                <div class="col-2">
                    <img src="">
                </div>
           </div>

        </div>
    </div>

<!-----------------------title-->
    <div class="small-contanier">
        <div class="row row-2">
            <h2>Latested Products</h2>
            <p>Sort BY :
              <select class="sort" onchange="showSort(this.value)">
                  <option value="">Select One</option>
                  <option value="asc">Price cheap</option>
                  <option value="desc">Price Expensive</option>
                  <option>Avarage</option>
              </select>    
           </p>
        </div>
    </div>

  <!-----------latested product-------------->
    <div class="small-contanier">
       <div class="row"  id="latested">

        <?php
        $sql="SELECT * FROM producttb";
        $result=mysqli_query($con, $sql);
        
        while($row = mysqli_fetch_array($result)) {
          echo component($row['ProductName'], $row['ProductPrice'], $row['ProductImage'], $row['ID']);
        }        ?>

       </div>
       <div class="page-btn">
             <span>1</span>
             <span>2</span>
             <span>3</span>
             <span>4</span>
             <span>&#8811</span>
             
         </div>
    </div>
    <hr>

    <!-----------------------title-->
    <div class="small-contanier">
        <div class="row row-2">
            <h2>MOst Viewed Products</h2>

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
       <div class="page-btn">
       view more

         </div>
    </div>
    <hr>


   <!-------footer-->
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
///////////////////////////////////////////////////////////////////////////////
function menutoggle() {
  var MenuItems= document.getElementById("MenuItems");
  
  if (MenuItems.style.display == "none") {
    MenuItems.style.display = "block";
  } else {
    MenuItems.style.display = "none";
  }
}

// for category selection /////////////////////////////////////////////////////
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
// for sort selection//////////////////////////////////////////////////////////
function showSort(str) {
  var xhttp;  
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("latested").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "sort.php?q="+str, true);
  xhttp.send();
}
// for search selection////////////////////////////////////////////////////////
function search(str) {
  var xhttp;  
  if (str.lenght == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtHint").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "getresult.php?r="+str, true);
  xhttp.send();
}
     </script>

</body>
</html>