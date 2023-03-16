<!DOCTYPE html>
<html lang="ne-NP">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="cart_style.css">
   <style>
    body {
    padding-top: 100px;
    background-color: #4158D0;
    background-image: linear-gradient(43deg, #4158D0 20%, #C850C0 46%, yellow 100%);
    margin:0px;
    }
    h1, h2, h3, h4, h5, h6, a {
   margin:0; padding:0;
    }
    .login {
  margin:0 auto;
  max-width:500px;
}
.login-header {
  color:#fff;
  text-align:center;
  font-size:300%;
}
/* .login-header h1 {
   text-shadow: 0px 5px 15px #000; */
}
form {
  border:.5px solid #fff;
  background:#4facff;
  border-radius:10px;
  box-shadow:0px 0px 10px #000;
}
form h3 {
  text-align:left;
  margin-left:40px;
  color:#fff;
}
form {
  box-sizing:border-box;
  padding-top:15px;
    padding-bottom:10%;
  margin:5% auto;
  text-align:center;
}
.login input[type="text"],
.login input[type="password"] {
  max-width:400px;
    width: 80%;
  line-height:3em;
  font-family: 'Ubuntu', sans-serif;
  margin:1em 2em;
  border-radius:5px;
  border:2px solid #f2f2f2;
  outline:none;
  padding-left:10px;
}
form input[type="button"] {
  height:30px;
  width:100px;
  background:#fff;
  border:1px solid #f2f2f2;
  border-radius:20px;
  color: slategrey;
  text-transform:uppercase;
  font-family: 'Ubuntu', sans-serif;
  cursor:pointer;
}
.sign-up{
  color:#f2f2f2;
  margin-left:-70%;
  cursor:pointer;
  text-decoration:underline;
}
.no-access {
  color:#E86850;
  margin:20px 0px 20px -57%;
  text-decoration:underline;
  cursor:pointer;
}
.try-again {
  color:#f2f2f2;
  text-decoration:underline;
  cursor:pointer;
}
 
/*Media Querie*/
@media only screen and (min-width : 150px) and (max-width : 530px){
  form h3 {
    text-align:center;
    margin:0;
  }
  .sign-up, .no-access {
    margin:10px 0;
  }
  .login-button {
    margin-bottom:10px;
  }
}
    </style>

</head>
<body>
<?php
 require_once('connection.php');
$error="";
$dbpassword="";
    // When form submitted, check and create user session.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
       
        if (isset($_POST['submit'])) {
          
          if(!empty($_POST['username']) && !empty($_POST['password'])) { 
               $username = $_POST["username"];
               $password = $_POST["password"];
               $username= mysqli_real_escape_string($con, $username);
               $password= mysqli_real_escape_string($con, $password);
               // Check user is exist in the database
               $query    = "SELECT * FROM usertb where UserName='$username'";
               $result = mysqli_query($con, $query);
               $numrows = mysqli_num_rows($result);
               
              if($numrows!=0) {
                   while($row=mysqli_fetch_array($result)) {        
                     if(password_verify($password, $row['Password'])) {
                            $serial_no=$row['SerialNumber'];
                            session_start();  
                            
                            $_SESSION['username']=$username;  
                            $_SESSION['serial_no']=$serial_no;
                            /* Redirect browser   */
                            header("Location: home.php");  
                      } else {
                           $error="Your Password is not Matched!";
                        }                                  
                   }
               } else {
                 $error="Invalid username";
               }
         
          } else{
            $error="All fields are required";
          }

        } else {
          $error="Your form is not submitted";
        }
    }    
?>
<div class="login">
  <div class="login-header">
    <h1>Login</h1>
  </div>

  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
    <?php echo $error; ?>
    <h3>Username:</h3>
    <input type="text" name="username" placeholder="Username"/><br>
    <h3>Password:</h3>
    <input type="password" name="password" placeholder="Password"/>
    <br>
    <input type="submit" name="submit" value="Login" class="login-button"/>
    <br>
    <br>
    IF You Are New User!!
    <a href="registration.php" class="sign-up">New Register</a>
    <br>
    <h6 class="no-access">Can't access your account?</h6>
  </form>
</div>
</body>
</html>