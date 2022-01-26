<?php
$dbname="agakiriro";
$dbusername="root";
$dbhost="localhost";
$dbpassword="";

try {
	$connection=new PDO("mysql:host={$dbhost};dbname={$dbname}",$dbusername,$dbpassword);
	$connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	if($connection){
    // echo "<script>alert('connected succcessfully');</script>";
	}
	else{
	echo "<script>alert('connection Faillure!!!');</script>";
	}
} catch (Exception $e) {
	
	$e->getMessage();
}

?>