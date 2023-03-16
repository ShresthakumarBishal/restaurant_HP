<?php
    session_start();
    $con = mysqli_connect('localhost','root','','productdb');
    if (!$con) {
      die('Could not connect: ' . mysqli_error($con));
    }
    if(isset($_POST['submit'])) {
        $username =$_POST['username'];
        $password =$_POST['password'];
        $sql ="SELECT * FROM usertb";
        $result = mysqli_query($con, $sql);
        $row = mysqli_num_rows($result);
            if($row == 1){
                echo "You Have Seccessfully Logined";
                $_SESSION['username'] = $username;
                header('Location:adminhome.php');
            }else {
                echo "login failed";
                header("Location: adminhome.php");
            }
        
    }
?>