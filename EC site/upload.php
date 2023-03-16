<?php

if(isset($_POST["submit"])) {
    $con = mysqli_connect('localhost','root','','productdb');
    if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
    }

    //set variable
    $date=date("Y/m/d");
    $success=1;
    $no=1;
    $category=$_POST['category'];
    $text=$_POST['text'];
    $price=$_POST['price'];
    $serial_no=$_POST['user_id'];
    $filename0=$_FILES['image']['name'];
    $filename1=$_FILES['image_1']['name'];
    $filename2=$_FILES['image_2']['name'];
    $filename3=$_FILES['image_3']['name'];
    
    $tempname0=$_FILES['image']['tmp_name'];
    $tempname1=$_FILES['image_1']['tmp_name'];
    $tempname2=$_FILES['image_2']['tmp_name'];
    $tempname3=$_FILES['image_3']['tmp_name'];
    
    $target_dir = "image/";
    $target_file0 = $target_dir . basename($filename0);
  
    $target_file1 = $target_dir . basename($filename1);
    $target_file2 = $target_dir . basename($filename2);
    $target_file3 = $target_dir . basename($filename3);

    $imageFileType0 = strtolower(pathinfo($target_file0,PATHINFO_EXTENSION));
    $imageFileType1= strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
    $imageFileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));
    $imageFileType3 = strtolower(pathinfo($target_file3,PATHINFO_EXTENSION));

      if($imageFileType0 != "jpg" && $imageFileType0 != "png" && $imageFileType0 != "jpeg"
      && $imageFileType0 != "gif" ) {
          
          $success=0;

      }
      if($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg"
      && $imageFileType1 != "gif" ) {
          
          $success=0;

      }
      if($imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg"
      && $imageFileType2 != "gif" ) {
          
          $success=0;

      }
      if($imageFileType3 != "jpg" && $imageFileType3 != "png" && $imageFileType3 != "jpeg"
      && $imageFileType3 != "gif" ) {
          
          $success=0;

      }

     if(!move_uploaded_file($tempname0, $target_file0)) {
       $success=0;
     
     }
     if(!move_uploaded_file($tempname1, $target_file1)) {
      $success=0;
     
    }
    if(!move_uploaded_file($tempname2, $target_file2)) {
      $success=0;
     
    }
    if(!move_uploaded_file($tempname3, $target_file3)) {
      $success=0;
     
    }

    /*
    // Check file size
    if ($_FILES['upload']['size'] > 500000) {
         echo "Sorry, your file is too large.";
         $success=0;

     }
    */

    
    // Check if $uploadOk is set to 0 by an error
    if($success!=0){

            $sql="INSERT INTO producttb (ProductName, SerialNumber, ProductImage, ProductImageOne, ProductImageTwo, ProductImageThree, ProductPrice, CategoryId, Views, DateTime)
                                VALUES ('$text', '$serial_no', '$target_file0', '$target_file1', '$target_file2', '$target_file3', '$price', '$category', '$no', '$date')";
            $result=mysqli_query($con, $sql);
            if($result){
              header("location: myprofile.php");
             // echo "The file ". htmlspecialchars(basename($filename)). " has been uploaded.";
            }else{
                echo "Sorry, uploading  file in table fail.";
            }
            } else {
            echo "Sorry, there was an error uploading your file.";
        }

} else {

    header('Location: index.php');
    exit;
  
}
    
// Check if image file is a actual image or fake image
  /*$check = getimagesize($_FILES['upload']['tmp_name']);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}
if(!$result){
    echo "fail" ($result);
}else {
// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
}

// Check file size
if ($_FILES['upload']['size'] > 500000) {
  echo "Sorry, your file is too large.";
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  
}

}
*/
?>