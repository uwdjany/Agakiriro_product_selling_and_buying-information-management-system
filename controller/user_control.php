<?php
include"../config/connection.php";
$fname="";
$phone="";
$lname="";
$email="";
$gender="";
$nationality="";
$national_id="";
$username="";
$password="";
$confirm="";
$DOB="";
$staff_type="";
$address="";
$notice="";
$insert="";
$photo="";
$notice1="";
$select="";
if(isset($_POST["insert"])){
$fname=$_POST["fname"];
$phone=$_POST["phone"];
$lname=$_POST["lname"];
$email=$_POST["email"];
$gender=$_POST["gender"];
$nationality=$_POST["nationality"];
$national_id=$_POST["national_id"];
$username=$_POST["username"];
$password=$_POST["password"];
$confirm=$_POST["confirm"];
$DOB=$_POST["DOB"];
$staff_type=$_POST["staff_type"];
$address=$_POST["address"];

if (!empty($fname)&&!empty($phone)&&!empty($lname)&&!empty($email)&&!empty($gender)&&!empty($nationality)&&!empty($national_id)&&!empty($username)&&!empty($password)&&!empty($confirm)&&!empty($DOB)&&!empty($staff_type)&&!empty($address)){

	try {

		$select=$connection->prepare("SELECT *FROM users_account WHERE E_mail='$email' OR National_id='$national_id' OR Telephone='$phone'");
		$select->execute();
		$result=$select->fetchAll();
		// var_dump($result);
		// die();
		if (!$result) {

					if (strlen($national_id)<=16 && strlen($phone)<=13) {
						if($password==$confirm){

						 $date=date_create($_POST["DOB"]);
					      $age=date_create(date("y-m-d"));
					      $diff=date_diff($date,$age);
					      $convert=$diff->format('%y');

					      if ($convert>=18) {
					      	include"user_photo_upload.php";

						$photo=$target_file;
						if (!empty($photo)) {
							$insert="INSERT INTO users_account(`First_name`,`Last_name`,`Gender`,`Country`,`National_id`,`E_mail`,`Telephone`,`Birth_date`,`User_type`,`Address`,`Username`,`Password`,`Photo`,`Registered_date`) VALUES('$fname','$lname','$gender','$nationality','$national_id','$email','$phone','$DOB','$staff_type','$address','$username','$password','$photo',Now())";
									$yes=$connection->exec($insert);
								if ($yes){
									$notice="<script>alert('Inserted In the database successfully!!')</script>";
									}//if inserting query is okay.
								else {
									$notice="<script>alert('!! Fail to Insert !!')</script>";
								}
						} else {
									$notice="<script>alert('!! Sorry, the photo field is empty or rename the photo name before uploading it. !!')</script>";
							
						}


					      } else {
					      	$notice="<script>alert('!! Sorry, the only condition to be staff you need to be turned 18 years or up not less !!')</script>";
					      }
					      

						
						}// password confirmation and checking
									else{
										$notice="<script>alert('!! Please match the password and you confirmation password  !!')</script>";}
					}
					 else {
						$notice="<script>alert('The national id is greater than the expected they must be 16 digit or less; OR TELEPHONE number is not macthing the expected one it must be also 12 whitout + sign or less.  !!')</script>";
					}
					
									}
						else {
								$notice="<script>alert('!! Please Enter your real E-mail,Telephone, and National id  !!')</script>";
						}
				}// end of try
				 catch (PDOException $e) {
					$notice=$e->getMessage();
				} //end of catch

				}// end of checking the empty fields
		else {
				$notice="<script>alert('Some of fields are empty!!')</script>";
			}
		}
	elseif (isset($_POST["insert_cust"])) {
		$fname=$_POST["fname"];
		$phone=$_POST["phone"];
		$lname=$_POST["lname"];
		$email=$_POST["email"];
		$gender=$_POST["gender"];
		$nationality=$_POST["nationality"];
		$national_id=$_POST["national_id"];
		$username=$_POST["username"];
		$password=$_POST["password"];
		$confirm=$_POST["confirm"];
		$address=$_POST["address"];
		$DOB=$_POST["DOB"];
		if (!empty($fname)&&!empty($phone)&&!empty($lname)&&!empty($email)&&!empty($gender)&&!empty($nationality)&&!empty($national_id)&&!empty($username)&&!empty($password)&&!empty($confirm)&&!empty($address)&&!empty($DOB)){

			try {

				$select=$connection->prepare("SELECT *FROM customers WHERE E_mail='$email' OR National_id='$national_id' OR Telephone='$phone'");
				$select->execute();
				$result=$select->fetchAll();
				// var_dump($result);
				// die();
				if (!$result) {


						if (strlen($national_id)<=16 && strlen($phone)<=13) {
						

						 $date=date_create($_POST["DOB"]);
					      $age=date_create(date("y-m-d"));
					      $diff=date_diff($date,$age);
					      $convert=$diff->format('%y');

					      if ($convert>=18) {
					      	if($password==$confirm){
							
									$insert="INSERT INTO customers(`First_name`,`Last_name`,`Gender`,`Birth_date`,`Country`,`National_id`,`E_mail`,`Telephone`,`User_type`,`Address`,`Username`,`Password`,`Registered_date`) VALUES('$fname','$lname','$gender','$DOB','$nationality','$national_id','$email','$phone','Customer','$address','$username','$password',Now())";
											$yes=$connection->exec($insert);
										if ($yes){
											$notice="<script>alert('Inserted In the database successfully!!')</script>";
											
			 								echo $notice."<script>document.location.href='login.php';</script>";
			 			
											}//if inserting query is okay.
										else {
											$notice="<script>alert('!! Fail to Insert !!')</script>";
										}
								
								}// password confirmation and checking
											else{
												$notice="<script>alert('!! Please match the password and you confirmation password  !!')</script>";}
									}
								else {
					      	$notice="<script>alert('!! Sorry, the only condition to be staff you need to be turned 18 years or up not less !!')</script>";
					      }
					      
					      }
					 else {
						$notice="<script>alert('The national id is greater than the expected they must be 16 digit or less; OR TELEPHONE number is not macthing the expected one it must be also 12 whitout + sign or less.  !!')</script>";
					}
				}
				else {
										$notice="<script>alert('!! Please Enter your real E-mail,Telephone, and National id  !!')</script>";
								}
						}// end of try
						 catch (PDOException $e) {
							$notice=$e->getMessage();
						} //end of catch

						}// end of checking the empty fields
				else {
						$notice="<script>alert('Some of fields are empty!!')</script>";
					}
	}
elseif (isset($_POST["cancel_cust"])) {
	header("location:../index.php");
}
elseif (isset($_POST["cancel"])) {
	
}

?>