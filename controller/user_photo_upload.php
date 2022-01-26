<?php
$target_dir = "../images_agakiriro/users_img/";
$target_file = $target_dir . basename($_FILES["photo"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$photo="";
$notice1="";
// Check if file already exists
if (file_exists($target_file)) {
  $notice1="<script>alert('Sorry, file already exists.')</script>";
  $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
 $notice1="<script>alert('Sorry, your file was not uploaded.')</script>";
 
// if everything is ok, try to upload file
}
 else {
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) { 
  		 $notice1="<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";
         $uploadOk = 0;
        }
  elseif (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
  	$photo=$target_file;
    $notice1= htmlspecialchars( basename( $_FILES["photo"]["name"]));
     

  } 
  else {
  		 $notice1="<script>alert('Sorry, there was an error uploading your file.')</script>";
  }
}
?>