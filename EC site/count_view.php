<?php
require_once('connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!------------count visiters------------------->   

     <?php
     $id=$_GET['id'];
     $id=mysqli_real_escape_string($con, $id);
     $id=htmlentities($id);
     $sql_count="SELECT * FROM count where id=$id"; 
     $ress=mysqli_query($con, $sql_count) or die (mysqli_error());
     $count=mysqli_num_rows($ress);
  if($count>0){ 
        while($row=mysqli_fetch_array($ress)) {
            $views=$row['views'];
            $sql_count="UPDATE count SET views=$views+1 where id=$id";
            $res=mysqli_query($con, $sql_count);
            header('location: productdetails.php');

    ?>      
     <?php
        }
     }else{ ?>
        <h5>Soryy, empty</h5>
     <?php }
     ?>
  
</body>
</html>