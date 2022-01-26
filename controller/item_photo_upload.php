<?php
$target_folder="../images_agakiriro/item_img/";
$target_file=$target_folder.basename($_FILES["photo"]["name"]);
$imageExtensiontype=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$notice="";
$photo="";
$upload=1;

if (file_exists($target_file)) {
	$notice="<script>alert('Sorry, the File trying to upload must be Renamed')</script>";
	$upload=0;
	// echo $notice."<script>document.location.href='../views/buying_status.php';</script>";

}
if ($upload==0) {
	$notice="<script>alert('Sorry, No file selected')</script>";
	$upload=0;
	// echo $notice."<script>document.location.href='../views/buying_status.php';</script>";

}  
 else {

 	if ($imageExtensiontype!="jpg" && $imageExtensiontype!="jpeg" && $imageExtensiontype!="png" && $imageExtensiontype!="gif") {
 		
	$notice="<script>alert('Sorry, the File trying to upload does not match the expected extensions;(JPEG,JPG,PNG and GIF)')</script>";
	$upload=0;

	}
	elseif (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
		$photo=$target_file;
	$notice="<script>alert('The File of type image uploaded successfully')</script>";
	

		
	} else {
	$notice="<script>alert('Sorry, the File trying to upload failled due to unknow issue. try again')</script>";
	
	}
	
}

?>