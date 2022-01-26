<?php
session_start();
require_once("../config/connection.php");
$username="";
$password="";
$notice="";

if(isset($_POST["connect"])){
 $username=$_POST["username"];
 $password=$_POST["password"];

 if (!empty($username) && !empty($password)) {

			 	$search=$connection->prepare("SELECT *FROM users_account WHERE `Username`='$username' AND `Password`='$password'");
			 $search->execute();
			 $result=$search->fetchAll();
			 $search1=$connection->prepare("SELECT *FROM customers WHERE `Username`='$username' AND `Password`='$password'");
			 	 $search1->execute();
			 	$result1=$search1->fetchAll();
			 if(!$result){ 	 
			 	if ($result1) {
			 		foreach($result1 as $row) {
			 				$_SESSION['Cust_id']=$row["Cust_id"];
			 				$_SESSION["Username"]=$row["Username"];
			 				$_SESSION["Password"]=$row["Password"];
			 				$_SESSION["First_name"]=$row["First_name"];
			 				$_SESSION["Last_name"]=$row["Last_name"];
			 				$_SESSION["E_mail"]=$row["E_mail"];
			 				$_SESSION["Telephone"]=$row["Telephone"];
			 				$_SESSION["User_type"]=$row["User_type"];
			 				// $_SESSION["Photo"]=$row["Photo"];
			 		
			 			$notice="<script>alert('Customer!!')</script>";
			 			
			 			echo $notice."<script>document.location.href='profile_cust.php';</script>";


			 		
			 		
			 	} 
			 	
			 }
			 else {
			 		$notice="<script>alert('Username and password incorrect!!')</script>";
			 	}	
			 }
			 else{
			 	foreach($result as $row) {
			 				$_SESSION['User_id']=$row["User_id"];
			 				$_SESSION["Username"]=$row["Username"];
			 				$_SESSION["Password"]=$row["Password"];
			 				$_SESSION["First_name"]=$row["First_name"];
			 				$_SESSION["Last_name"]=$row["Last_name"];
			 				$_SESSION["E_mail"]=$row["E_mail"];
			 				$_SESSION["Telephone"]=$row["Telephone"];
			 				$_SESSION["User_type"]=$row["User_type"];
			 				$_SESSION["Photo"]=$row["Photo"];
			 		if($_SESSION["User_type"]=="Manager"){

			 			$notice="<script>alert('Manager!!')</script>";
			 			echo $notice."<script>document.location.href='profile.php';</script>";
			 			
			 		}
			 		elseif ($_SESSION["User_type"]=="Staff") {
			 			$notice="<script>alert('Staff!!')</script>";
			 			echo $notice."<script>document.location.href='profile.php';</script>";
			 		}
			 	
			 	}
				 }

			 } //End of if not empty
	 else {
	 	# code...
	 }
 
 

}
?>