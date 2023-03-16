<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
require_once('connection.php');
date_default_timezone_set("Asia/Kathmandu");
$date=date('m/d/Y H:i:s');

$count=0;
$comman=$error="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        $username = $_POST["username"];

      if (empty($_POST["password"])) {
        $passErr = "password is required";
      } else { 
        $password = $_POST["password"];
        $repassword = $_POST["repassword"];
            if($password == $repassword) {      
              /// check username or password is exist or not in database
              $sql="SELECT * FROM test where username='$username'";
              $result=mysqli_query($con, $sql);
              $numrows=mysqli_num_rows($result);
              echo $numrows."\n";
              echo $username."\n";

              if($numrows!=0) {
                while($row=mysqli_fetch_array($result)) {        
                      if(password_verify($password, $row['password'])) {
                         $count= 1;
                          break;
                      } else {
                         $count=0;
                      }
                  }
                                
                if($count==0) {
                  $password=password_hash($password, PASSWORD_BCRYPT);
                  $sql="INSERT INTO test (username, password, datetime) 
                  VALUES ('$username', '$password', '$date')";
                  $result=mysqli_query($con, $sql);
                      if($result) {
                        echo "sucess";
                         
                      } else{
                          $error="unable to insert";
                      }
                } else {
                  $error="This Account is Already Used!";
                }  
            } else {
                      $password=password_hash($password, PASSWORD_BCRYPT);
            
                      $sql="INSERT INTO test (username, password, datetime) 
                      VALUES ('$username', '$password', '$date')";
                      $result=mysqli_query($con, $sql);
                          if($result) {
                            echo "sucess";
                              
                          } else{
                              $error="unable to insert";
                          }                  
              }     
          } else {
          $error="fill same both password";
          }
      }
    }
}

?>
<?php
echo $date;
echo $count.""; echo " ".$comman; echo $error;  ?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
  <label>Your name</label>
  <input type="text" name="username">
  <input type="password" name="password">
  <input type="password" name="repassword">
  <input type="submit"  name="submit">
</form>
<a href="sending.php">sending</a>
</body>
</html>
