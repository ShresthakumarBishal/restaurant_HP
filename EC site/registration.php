<?php
session_start();
require_once('connection.php');
//set date
$date=date('m/d/Y H:i:s');
date_default_timezone_set("Asia/Kathmandu");

// define variables and set to empty values
$nameErr = $emailErr = $passErr = $error= $false=$usernameLen=$lastSalt="";
$find=0;

function check_input($data) {
  $data = trim($data);// data = recive data infoo
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // create serial nmber
      $firstSalt="BS";
     

    if (isset($_POST['login']))
    {
        // set variables
        $adress = check_input($_POST["adress"]);
        $city = check_input($_POST["city"]);
        $lastSalt= substr($city, 0, 1);
        $lastSalt =strtoupper($lastSalt);
        $ph_number=check_input($_POST['ph_number']);
        

      ////////////empty check//////////////////////////////
        if (empty($_POST["username"])) {
          $nameErr = "Name is required";
        } else {
          $username = check_input($_POST["username"]);
          $usernameLen= strlen($username);
          // check if name only contains letters and whitespace
          if (!preg_match("/^[a-zA-Z-' ]*$/",$username)) {
            $nameErr = "Only letters and white space allowed";
          }
        }
      /////////////////////empty check////////////////////////      
      if (empty($_POST["email"])) {
        $emailErr = "Email is required";
      } else {
        $email = check_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Invalid email format";
        }
      }
      /////////////////empty check////////////////////////////
      if (empty($_POST["password"])) {
        $passErr = "password is required";
      } else { 
         $password = check_input($_POST["password"]);
         $repassword = check_input($_POST["repassword"]);
            if($password == $repassword) {      
              /// check username or password is exist or not in database
              $check_query="SELECT * FROM usertb where username='$username'";
              $result=mysqli_query($con, $check_query);
              $numrows=mysqli_num_rows($result);
              if($numrows!=0){
                  while($row=mysqli_fetch_array($result)) {        
                      if(password_verify($password, $row['password'])) {
                        $find=1;
                        break;
                      } else {
                        $find=0;
                      }
                  }
              
                  if($find==0) {
                      $password=password_hash($password, PASSWORD_DEFAULT);
                      $serial_no=$firstSalt.$usernameLen.$lastSalt;
                      //register users
                      $sql="INSERT INTO usertb (UserName, Password, SerialNumber, Email, PhoneNumber, Adress, City) 
                      VALUES ('$username', '$password', '$serial_no', '$email', '$ph_number', '$adress', '$city')";
                      
                      $result=mysqli_query($con, $sql);
                          if($result) {

                            $_SESSION['username']=$username;  
                            $_SESSION['serial_no']=$serial_no;
                            header("location: home.php");   
                          } else{
                              $error="unable to insert";
                          }
                  } else {
                    $error="This Account is Already Used!";
                  } 
                    /*if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $password)) {
                      $passErr = "Match the reqiremants";
                    */
              } else {
                $password=password_hash($password, PASSWORD_DEFAULT);
                $serial_no=$firstSalt.$usernameLen.$lastSalt;
                //register users
                $sql="INSERT INTO usertb (UserName, Password, SerialNumber, Email, PhoneNumber, Adress, City) 
                                  VALUES ('$username', '$password', '$serial_no', '$email', '$ph_number', '$adress', '$city')";
                
                $result=mysqli_query($con, $sql);
                    if($result) {
                      $_SESSION['username']=$username; 
                      $_SESSION['serial_no']=$serial_no; 
                      header("location: home.php");
                      
                    } else{
                        $error="unable to insert in Dtabase";
                    }
              }  
            }  else {
              $passErr ="Please, fill both same password";
            }   
       }     
    }
 }
    
                //send mail 
              /* $to = $email;
                $subject = "check";
                $message = "<p>".$username."</p><p>".$email."</p><p>".$adress."</p>";
                $headers ="From: stha1265@gmail.com";
                if (mail($to, $subject, $message, $headers)) {
                    echo "<script>alert('successfully, Details sent to $to...')</script>";
                    // Redirect
                    header("location: home.php");

                } else {
                    $eroor=  "Email sending failed...";
                }*/
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="single_style.css">

    <title>Registration Form</title>
  
</head>
<!-- Body Starts Here -->
<body style="background-color: lightblue;">
<div class="container">
<!-- Feedback Form Starts Here -->
<div id="feedback">
<!-- Heading Of The Form -->
<div class="head">
  <div id="registerForm">
<h3>Registration Form</h3>
<p>This is Registration Form. Send us your details !</p>
</div>
<!-- Feedback Form -->
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" id="form" method="POST">
<input name="username" placeholder="Your Name" type="text">
<input name="password" placeholder="password" type="password">
<input name="repassword" placeholder="repassword" type="password">
<input name="email" placeholder="Your Email" type="email">
<input name="ph_number" placeholder="phone Number" type="tel" pattern="[0-9]{10}">
<input name="adress" placeholder="Your Adress" type="Text">
<input name="city" placeholder="Your City or Towl" type="text">
<input id="send" name="login" type="submit" value="Register">
</form>
<div><b>Already Have Registered ? </b><a href="login.php"><button type="button" style="background-color: green; width: 50px; height: 30px">Login</button></a></div>
<?php
echo $nameErr;
echo $passErr;
echo $error;
?>
</div>

</div>
</div>
</body>
<!-- Body Ends Here -->
</html>