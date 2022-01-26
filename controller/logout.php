<?php

session_start();

	if (isset($_GET["logt"])) {
			 session_unset();
			session_destroy();
			
		$notice="<script>alert('You logged out of the system successfully')</script>";
		
			echo $notice."<script>document.location.href='../index.php';</script>";
	
			
	
		
	
	} 
		
// 		if (!$_SESSION["User_id"]) {

// 		$notice="<script>alert('Your session is expired!!')</script>";
// 		echo $notice."<script>document.location.href='../index.php';</script>";
// 		header("location:../index.php");
		
			
// 	}

// if (!$_SESSION["Cust_id"]) {

// 		$notice="<script>alert('Your session is expired!!')</script>";
// 		echo $notice."<script>document.location.href='../index.php';</script>";
// 		header("location:../index.php");
		
			
// 	}
// 	else{
// 		echo $notice."<script>document.location.href='../profile.php';</script>";
// 	}

	

	
 ?>