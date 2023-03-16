<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();

//include php needed file
require_once('connection.php');
require_once('./php/component.php');

if(isset($_GET['id'])) {
    
     $product_id=$_GET['id'];
    $product_id=mysqli_real_escape_string($con, $product_id);
      $product_id=htmlentities($product_id);
     $sql_count="SELECT * FROM producttb where id='$product_id'"; 
     $ress=mysqli_query($con, $sql_count) or die (mysqli_error());
     $count=mysqli_num_rows($ress);
  if($count>0){ 
        while($row=mysqli_fetch_array($ress)) {
            $views=$row['Views'];
            $sql_count="UPDATE producttb SET views=$views+1 where id='$product_id'";
            $res=mysqli_query($con, $sql_count);}
    }

} else{
    header("location: index.php");
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
  #myDIV {
      display:none;
  width: 75%;
  padding: 50px 0;
  text-align: center;
  background-color: lightblue;
  margin: auto;
}
.box {
    margin:15px;
}
fieldset{
    width:70%;
    margin-bottom: 25px;
    background: #eee;
}
.box form .input {
    padding: 5px 5px; 
    font-size: large;
    width:80%;
    height:100px;
}
.box form {
    margin-bottom:15px;
   
}
.box form .cmmt-submit {
    padding: 5px 5px; 
    font-size: large;
    color: red;
}
legend {
    font-size: large;
    color: green;
    margin-left: 25px;
}
.user_cmmt {
    padding:10px;
    background: #aaa;
    border: 2px outset white;
   border-radius: 12px;
   width:60%;
}
.owner_cmmt{
    float:right;
    padding:10px;
    background: #aaa;
    border: 2px outset white;
   border-radius: 12px;
   width:60%;
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
            .single-product .col-2 #ProductImg{
                height: 400px;
            }
            .small-img-col img {
                height: 70px;
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
             fieldset{
         width:100%;
          }
        }
    </style>
</head>

<body>


<?php
/////////////////// diff nav for user and members /////////////////////
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
    <?php if(isset($_SESSION['username'])) { echo $_SESSION['username']; }?>
    <?php
    }
    ?>
    
<!----------single product detail------------------------------------------------------------------>
        <?php
        $saler_id="";
        $sql="SELECT * FROM producttb where id=$product_id";
        $result=mysqli_query($con, $sql);
                
        while($row = mysqli_fetch_array($result)) {
            $saler_id=$row['SerialNumber'];  ?>

    <div class="small-contanier single-product">
        <div class="row">
            <div class="col-2">
                    <img src="<?php echo $row["ProductImage"]; ?>" width="100%" id="ProductImg">
                    <div class="col">
                    <a class="prev" onclick="plusSlides(-1)">❮</a>
                    <a class="next" onclick="plusSlides(1)">❯</a>
                    </div>

                 <div class="small-img-row">
                 <?php if($row["ProductImageThree"] != "" && $row["ProductImageOne"] != "" && $row["ProductImageTwo"] != ""){ ?>
                       <div class="small-img-col">
                       <img src="<?php echo $row["ProductImage"]; ?>" onclick="side(this)" alt="bishal" width="100%" class="small-img">
                       </div>
                 <?php } if(!$row["ProductImageOne"] == ""){ ?>
                       <div class="small-img-col">
                           <img src="<?php echo $row["ProductImageOne"]; ?>" onclick="side(this)" alt="bishal"  width="100%" class="small-img">
                       </div>
                 <?php } if(!$row["ProductImageTwo"] == ""){ ?>
                       <div class="small-img-col">
                           <img src="<?php echo $row["ProductImageTwo"]; ?>" onclick="side(this)" alt="bishal" width="100%" class="small-img">
                       </div>
                 <?php } if(!$row["ProductImageThree"] == ""){ ?>
                       <div class="small-img-col">
                           <img src="<?php echo $row["ProductImageThree"]; ?>" onclick="side(this)" alt="bishal" width="100%" class="small-img">
                       </div>
                <?php } ?>

                </div>
<!---------------------------FOR LIKE AND COMMENT BUTTON-------------------------------------->
                <div>
                    <button onclick="like()">LIKE <span id="like"></span></button> 
                    <a href="#cmmt-box"> <button>comment</button></a> 
                </div>
            </div>

            <div class="col-2">
                    <p>Home/<?php echo $row["ProductName"]; ?>  views: <?php echo $row["Views"]; ?></p>
                    <h2><?php echo $row["ProductName"]; ?></h2>
                    <h4>Price: Rps <?php echo $row["ProductPrice"]; ?></h4>
                    
                    <select>
                        <option>select size</option>
                        <option>XXL</option>
                        <option>Small</option>
                    </select>
                    <input type="number" value="1">
                    <a href='' class="btn">Add to Card</a><br>
                    <h3>Product Details</h3>
                    <p>hugf huuhreth huerhuehuyurt ba hrew wehuew ufgewyr vbbpiruyr uw uwertyr </p>
            </div>
         </div>
                
    </div>  

       <?php } // php close
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
            echo component($row['ProductName'], $row['ProductPrice'], $row['ProductImage'], $row['ID']);
        }

        ?> 
     </div>
     </div>
<!-------------------------comment box------------------------------------------------------- -------->

    <div class="small-contanier" id="cmmt-box">
    <br>
    <br>
        <fieldset>
            <legend>Comment Box</legend>
            <div class="box" id="box">
                <form name="myForm" action="getresult.php" onsubmit="return my_comment()" method="POST">
                    <textarea type="text" name="cmmt-input" class="input" placeholder="comment....."></textarea>
                    <input type="hidden" name="product_id" value="<?php echo $product_id;?>">
                    <input type="hidden" name="saler_id" value="<?php echo $saler_id;?>">
                    <br>
                    <input type="submit" class="cmmt-submit" name="cmmt-submit" value="Comment">
                </form>
                    <div class="display-box">
                        <?php
                        
                            $sql="SELECT * FROM commenttb where ProductId = $product_id order by id desc limit 8 ";
                            $result=mysqli_query($con, $sql);
                            $num_result = mysqli_num_rows($result);
                            if($num_result > 0) {
                                while ($row=mysqli_fetch_array($result)){ 
                                    if($saler_id == $row['UserId']) {
                                    ?>
                                    
                                    <div class="owner_cmmt">
                                        <div><strong><?php echo $row['UserName'];?></strong></div>
                                        <div><?php echo $row['CommentContent'];?></div>
                                    </div>
                                    <br>
                                    
                                    <?php   } else { ?>
                                            <div class="user_cmmt">
                                            <div><strong><?php echo $row['UserName'];?></strong></div>
                                            <div><?php echo $row['CommentContent'];?></div>
                                            </div><br>
                                <?php       }    
                                }
                            } else {
                            echo "No comments are available now!!";
                            }   ?>
                    </div>
            </div>
    
        </fieldset>
    </div>
<!-------------------------FOOTER------------------------------------------------------- -------->
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

<script>
//// for COMMENT post/////////////////////////////////////////
    function my_comment(){
        var x = document.forms["myForm"]["cmmt-input"].value;
        if (x == "") {
            alert("Comment must be filled out");
            return false;
        }
    <?php
     if (!isset($_SESSION['username'])) {?>
       alert("FIRST login page");
       window.location.href = "login.php";
       return false;
    <?php }?>
    }
</script>


<script type="text/javascript">
///// for LIKE post //////////////////////////////////////////////////
function load_like(value) {
            var xhttp, like = "";
            var liked = value;  
            var obj = { "product_id": <?php echo $product_id; ?>, "liked": liked};
            var dbParam = JSON.stringify(obj);
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                document.getElementById("like").innerHTML = this.responseText;
                }
            };
            xhttp.open("POST", "getresult.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("like=" + dbParam);
                
  
     }
load_like();

function like() {
    <?php if(!isset($_SESSION['username'])){ ?>
        alert("First login page"); 
        window.location.href = "login.php";
    <?php }
     ?>
    load_like(1);
  
}

</script>
<script>

function menutoggle() {
  var MenuItems= document.getElementById("MenuItems");
  
  if (MenuItems.style.display ==="none") {
    MenuItems.style.display = "block";
  } else {
    MenuItems.style.display = "none";
  }
}

     </script>

    <!--js for skide imge 
    
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
var SmallImg = document.getElementByClassName("small-img");

    -------->
    <script>
    function side(p) {
        var ProductImg = document.getElementById("ProductImg");
       
        ProductImg.src = p.src;
     
    }

</script>

</body>
</html>