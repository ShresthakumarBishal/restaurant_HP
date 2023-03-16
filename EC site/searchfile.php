<!DOCTYPE html>
<html lang="en">
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
</head>
<body>

<?php
session_start();
// diff nav for user and members
if(isset($_SESSION['username'])) {
?>

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
        
<?php
} else { ?>
<!----------nav for users----------------------------------------------------------------->
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
<?php
}
?>

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

<!--search result-------------->

  <?php
      require_once('connection.php');
      require_once('./php/component.php');

  if(isset($_POST['search']))

  {
    $sucess=0;
    $search=$_POST['find'];
    $sql="SELECT * from producttb where product_name like '%$search%'";
    $result=mysqli_query($con, $sql);
    $nom=mysqli_num_rows($result);
    
  ?>
<div class="small-contanier">
      <h3><?php echo "You Have Searched:$search(Results:$nom)";?></h3>
  <div class="row">
  <?php
    
  if($nom > 0){
      $sucess=1;
      while($row = mysqli_fetch_array($result)) {
        echo component($row['product_name'], $row['product_price'], $row['product_image'], $row['id']);
        }
  } else {
      echo "<hr>";
      $nxtSearch = explode(" ", $search);
      $query ="SELECT * FROM producttb WHERE product_name like '%" . $nxtSearch[0] . "%'";
        
          for($i = 1; $i < count($nxtSearch); $i++) {
            if(!empty($nxtSearch[$i])) {
              $query .= " OR product_name  like '%" . $nxtSearch[$i] . "%'";
            }
          }

      $result = mysqli_query($con, $query);
      $nom=mysqli_num_rows($result);

      if($nom > 0) {
          while($row = mysqli_fetch_array($result)) {
            echo component($row['product_name'], $row['product_price'], $row['product_image'], $row['id']);
          }
      }
  }

?>
</div>
<!--search releted result-------------->
<h3>Releted Products</h3>
 <div class="row">
  <?php
  if($sucess==1){

      $aKeyword = explode(" ", $search);
      // if second word is empty, it will false
      if(!empty($aKeyword[1])) {
          $query ="SELECT * FROM producttb WHERE product_name like '%" . $aKeyword[0] . "%'";
          
              for($i = 1; $i < count($aKeyword); $i++) {
                  $query .= " OR product_name  like '%" . $aKeyword[$i] . "%'";
              }
              

          $result = mysqli_query($con, $query);
          $nom=mysqli_num_rows($result);
          echo "success=1";

          if($nom > 0) {
            while($row = mysqli_fetch_array($result)) {
              echo component($row['product_name'], $row['product_price'], $row['product_image'], $row['id']);
            }

          }
      } else{
          $fistThree=substr($search, 0, 3);
          $sql="SELECT * from producttb where product_name like '$fistThree%'";
          $result=mysqli_query($con, $sql);
          $nom=mysqli_num_rows($result);
         
          if($nom > 0) {
            while($row = mysqli_fetch_array($result)) {
              echo component($row['product_name'], $row['product_price'], $row['product_image'], $row['id']);
            }
          }
      }
  } else {
      $fistThree=substr($search, 0, 3);
      $sql="SELECT * from producttb where product_name like '$fistThree%'";
      $result=mysqli_query($con, $sql);
      $nom=mysqli_num_rows($result);
      
      if($nom > 0) {
        while($row = mysqli_fetch_array($result)) {
          echo component($row['product_name'], $row['product_price'], $row['product_image'], $row['id']);
        }
      }
  }

} else{
    header("location: index.php");
  }
  ?>

 </div>
</div>

    <script>
    // for search selection
function search(str) {
  var xhttp;  
  if (str.lenght == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtHint").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "searchfile.php?r="+str, true);
  xhttp.send();
}
}
    </script>
</body>
</html>