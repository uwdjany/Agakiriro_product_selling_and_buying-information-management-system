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
$photo="";
$notice="";
if(isset($_POST["update"])){
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
$staff_type=$_SESSION["User_type"];
$address=$_POST["address"];

$image="";
if ($_SESSION["User_type"]=='Customer') {
 $_SESSION["Cust_id"];
  // $select->execute();

// foreach ($select as $row => $value) {
 // $image=$value["Photo"];
// }
} 
else {
  $select=$connection->prepare("SELECT *FROM users_account WHERE User_id='".$_SESSION["User_id"]."'");
  $select->execute();

foreach ($select as $row => $value) {
 $image=$value["Photo"];
}
}

if (!empty($fname)&&!empty($phone)&&!empty($lname)&&!empty($email)&&!empty($gender)&&!empty($nationality)&&!empty($national_id)&&!empty($username)&&!empty($password)&&!empty($confirm)&&!empty($DOB)&&!empty($staff_type)&&!empty($address)&&!empty($phone)){

    if ($_SESSION["User_type"]=='Customer') {
        try {

            if (strlen($national_id)<=16 && strlen($phone)<=13) {
                        if($password==$confirm){

                         $date=date_create($_POST["DOB"]);
                          $age=date_create(date("y-m-d"));
                          $diff=date_diff($date,$age);
                          $convert=$diff->format('%y');

                          if ($convert>=18) {
                             $insert="UPDATE  customers SET `First_name`='$fname',`Last_name`='$lname',`Gender`='$gender',`Country`='$nationality',`National_id`='$national_id',`Birth_date`='$DOB',`User_type`='$staff_type',`Address`='$address',`Username`='$username',`Password`='$password' WHERE Cust_id='".$_SESSION["Cust_id"]."'";
                                    $yes=$connection->exec($insert);
                                        if ($yes){
                                            $notice="<script>alert('Updated  successfully !!')</script>";
                                            }//if inserting query is okay.
                                        else {
                                            $notice="<script>alert('!! Fail to Insert  because you did not enter or edit anything!!')</script>";
                                        }
                                    
                                          }// password confirmation and checking
                                    else {
                            $notice="<script>alert('!! Sorry, the only condition to be staff you need to be turned 18 years or up not less !!')</script>";
                                      }
                          

                        
                        }// email,phone and national id checking
                                    else{
                                        $notice="<script>alert('!! Please match the password and you confirmation password  !!')</script>";}
                                    }
                    
                     else {
                        $notice="<script>alert('The national id is greater than the expected they must be 16 digit or less; OR TELEPHONE number is not macthing the expected one it must be also 12 whitout + sign or less.  !!')</script>";
                    }

                    }// end of try
                             catch (PDOException $e) {
                                $notice=$e->getMessage();
                            } //end of catch
                    
    } //end if of customer 
    elseif ($_SESSION["User_type"]=="Manager") {
       
                     try {

                         if (strlen($national_id)<=16 && strlen($phone)<=13) {
                        

                         $date=date_create($_POST["DOB"]);
                          $age=date_create(date("y-m-d"));
                          $diff=date_diff($date,$age);
                          $convert=$diff->format('%y');

                          if ($convert>=18) {
                              if($password==$confirm){
                                include"../controller/user_photo_upload.php";
                                if (!empty($photo)) {
                                    $insert="UPDATE  users_account SET `First_name`='$fname',`Last_name`='$lname',`Gender`='$gender',`Country`='$nationality',`National_id`='$national_id',`Birth_date`='$DOB',`User_type`='$staff_type',`Address`='$address',`Username`='$username',`Password`='$password',`Photo`='$photo' WHERE User_id='".$_SESSION["User_id"]."'";
                                            $yes=$connection->exec($insert);
                                        if ($yes){
                                            $notice="<script>alert('Updated  successfully!!')</script>";
                                            }//if inserting query is okay.
                                        else {
                                            $notice="<script>alert('!! Fail to Insert !!')</script>";
                                        }
                                } 
                                elseif(empty($photo)) {

                                             $insert="UPDATE  users_account SET `First_name`='$fname',`Last_name`='$lname',`Gender`='$gender',`Country`='$nationality',`National_id`='$national_id',`Birth_date`='$DOB',`User_type`='$staff_type',`Address`='$address',`Username`='$username',`Password`='$password' WHERE User_id='".$_SESSION["User_id"]."'";
                                            $yes=$connection->exec($insert);
                                        if ($yes){
                                            $notice="<script>alert('Updated  successfully without photo edit edit!!')</script>";
                                            }//if inserting query is okay.
                                        else {
                                            $notice="<script>alert('!! Fail to Insert without photo edit edit!!')</script>";
                                        }    
                                    }
                                    }// password confirmation and checking
                                    else{
                                        $notice="<script>alert('!!Fail; your password and confirmation do not match !!')</script>";
                                    }// password confirmation and checking
                                     }
                                      else {
                            $notice="<script>alert('!! Sorry, the only condition to be staff you need to be turned 18 years or up not less !!')</script>";
                                      }
                                      }//end of national id and telephone checking
                    
                     else {
                        $notice="<script>alert('The national id is greater than the expected they must be 16 digit or less; OR TELEPHONE number is not macthing the expected one it must be also 12 whitout + sign or less.  !!')</script>";
                           }
                }// end of try
                 catch (PDOException $e) {
                    $notice=$e->getMessage();
                } //end of catch

       }//end if of Manager 
  elseif ($_SESSION["User_type"]=="Staff") {
       
                     try {

                         if (strlen($national_id)<=16 && strlen($phone)<=13) {
                        

                         $date=date_create($_POST["DOB"]);
                          $age=date_create(date("y-m-d"));
                          $diff=date_diff($date,$age);
                          $convert=$diff->format('%y');

                          if ($convert>=18) {
                              if($password==$confirm){
                                include"../controller/user_photo_upload.php";
                                if (!empty($photo)) {
                                    $insert="UPDATE  users_account SET `First_name`='$fname',`Last_name`='$lname',`Gender`='$gender',`Country`='$nationality',`National_id`='$national_id',`Birth_date`='$DOB',`User_type`='$staff_type',`Address`='$address',`Username`='$username',`Password`='$password',`Photo`='$photo' WHERE User_id='".$_SESSION["User_id"]."'";
                                            $yes=$connection->exec($insert);
                                        if ($yes){
                                            $notice="<script>alert('Updated  successfully!!')</script>";
                                            }//if inserting query is okay.
                                        else {
                                            $notice="<script>alert('!! Fail to Insert !!')</script>";
                                        }
                                } 
                                elseif(empty($photo)) {

                                             $insert="UPDATE  users_account SET `First_name`='$fname',`Last_name`='$lname',`Gender`='$gender',`Country`='$nationality',`National_id`='$national_id',`Birth_date`='$DOB',`User_type`='$staff_type',`Address`='$address',`Username`='$username',`Password`='$password' WHERE User_id='".$_SESSION["User_id"]."'";
                                            $yes=$connection->exec($insert);
                                        if ($yes){
                                            $notice="<script>alert('Updated  successfully without photo edit edit!!')</script>";
                                            }//if inserting query is okay.
                                        else {
                                            $notice="<script>alert('!! Fail to Insert without photo edit edit!!')</script>";
                                        }    
                                    }
                                    }// password confirmation and checking
                                    else{
                                        $notice="<script>alert('!!Fail; your password and confirmation do not match !!')</script>";
                                    }// password confirmation and checking
                                     }
                                      else {
                            $notice="<script>alert('!! Sorry, the only condition to be staff you need to be turned 18 years or up not less !!')</script>";
                                      }
                                      }//end of national id and telephone checking
                    
                     else {
                        $notice="<script>alert('The national id is greater than the expected they must be 16 digit or less; OR TELEPHONE number is not macthing the expected one it must be also 12 whitout + sign or less.  !!')</script>";
                           }
                }// end of try
                 catch (PDOException $e) {
                    $notice=$e->getMessage();
                } //end of catch

       }//end if of Staff
   }//end if fields not empty
   else{
            $notice='<script>alert("Some fields are empty!!")</script>';

   }
}//end of update

        elseif (isset($_POST["cancel"])) {
            $notice='<script>alert("Cancelled successfully")</script>';
           echo $notice.'<script>document.location.href="../views/profile.php";</script>';
            
        }




?>