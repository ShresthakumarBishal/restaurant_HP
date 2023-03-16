<?php
session_start();
require_once('connection.php');
$sql2="INSERT INTO student (ID, FirstName) VALUE ('', 'fff')";
$result2=mysqli_query($con, $sql2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
>
</body>
</html>