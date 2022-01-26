<?php
// session_start();
include"../config/connection.php";
$item_type="";
$item_cost="";
$notice="";
$Cust_id=$_SESSION['Cust_id'];
$User_type=$_SESSION["User_type"];
$Fname=$_SESSION["First_name"];
$Lname=$_SESSION["Last_name"];
$Email=$_SESSION["E_mail"];
$Tel=$_SESSION["Telephone"];
$names=$Fname." ".$Lname;
	
if (isset($_POST["insert1"])) {
	// include '../controller/item_photo_upload.php';
	$item_cost=$_POST["amount"];
	$item_type=$_POST["item_name"];



	if (!empty($item_cost) && !empty($item_type)) {

		
		try {

			include '../controller/item_photo_upload.php';// uploading image 
			if (empty($photo)) {
				$notice="<script>alert('the photo field is empty or rename the photo before uploading it then it will accept!!')</script>";
			} 
			else {
				$insert="INSERT INTO `products`( `Item_type`, `Owner_names`, `E_mail`, `Telephone`, `Item_cost`,`Item_photo`,`Cust_id`, `Status`)
					 VALUES ('$item_type','$names','$Email','$Tel','$item_cost','$photo',$Cust_id,'Appending')";
					 $insert_yes=$connection->exec($insert);
					
					 if($insert_yes){
						$notice="<script>alert('Products inserted successfully!!')</script>";
					 }
					 else{
						$notice="<script>alert('Failure.! Try again to insert the Products !!')</script>";
						 }
			}
		} catch (PDOException $e) {
			$e->getMessage();
		}

	} else {
				$notice="<script>alert('Some fields are empty; please make sure all fields are filled!!')</script>";
		}
	}
 elseif (isset($_POST["cancel1"])) {
  
 $item_cost="";
 $item_type="";
  } 




?>