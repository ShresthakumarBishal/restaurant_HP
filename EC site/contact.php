<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
        <style>
        
            * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
} 
body {
    background: #ccc;
}
        
        h1{
          height:70px;
          text-align:center;
          padding: 10px;

            color:red;
            background: #ccc;
         
           
        }
        .row {
            font-size: large;
            margin-top:25px;
        }
        form {
            margin:10px;
        }
        form input {
           
            padding:5px;
        }
        form textarea {
            width:80%;
            height:100px;
            padding:5px;
        } 
        input[type="submit"] {
            color: red;
            font-size: large;
        }
        label {
            font-style: italic;
            color: blue;

        }
        td {
            padding:5px;
        }
        table {
            background: #aaa;
            padding:25px;
            border-radius: 20px;
        }


        </style>
</head>

<body>
<div class="navbar">
     <div class="logo"> <a href="home.php"> 
                    Hamro Bazar!
     </a></div>
                <div> <?php if(isset($_SESSION['username'])) { echo $_SESSION['username']; }?> </div>
                <nav>
                    <ul id="MenuItems">
                        <li><a href="myprofile.php" style="font-size: 20px;">My Profile</a></li>
                        <li><a href="" style="font-size: 20px;">Notification</a></li>
                        <li><a href="cart.php" style="font-size: 20px;"> cart </a></li>
                        <li><a href="contact.php" style="font-size: 20px;"> About Us </a></li>
                        <li><a href="logout.php" style="font-size: 20px;">logOut</a></li>
                    </ul>
                </nav>
                <i id="menu" class="fa fa-bars" onclick="menutoggle()">Menu</i>
</div>

<div class="small-contanier body">

 <div class="detail">
  <h1>Details About Us</h1>

  </div>
    <div class="small-contanier">
   <div class="row">
   <div class="col-2">
     <table>
        <tr>

        <td><strong> Company Name: </strong></td> 
        <td>  Hamro Bazar.com  </td> 
        </tr>
       
        <tr>
        <td> <strong>  Email :</strong></td> 
        <td> stha1265@gmail </td> 
        </tr>

        <tr>
        <td><strong>   Phuone No :</strong></td> 
        <td> 382579156</td> 
        </tr>
            
        <tr>
        <td> <strong>  Address</strong></td> 
        <td> Rampur, Palpa</td> 
        </tr>
               
            
    
    </table>
    </div>
    <div class="col-2">
    <h2>Contact Us </h2>
    <pre>If You Have Any Problem Contact Us</pre>
    <form>
     <label> Type Your Name: <br>
     <input type="text" name="name"></label><br>
     <label> Type Your Email: <br>
     <input type="email" name="email"><br>
     <label> Your Messages </label> <br>
     <textarea type="text" name="contact"></textarea><br>
     <input type="submit" name="contact">
    </form>
    </div>
  </div>
  </div>
</div>

</body>
</html>