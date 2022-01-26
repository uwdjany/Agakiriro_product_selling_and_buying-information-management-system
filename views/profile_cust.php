 <?php 
 include '../controller/logout.php';
 // session_start();
 include '../controller/update_profile.php';
include '../config/connection.php';
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
// if ($_SESSION["User_type"]=='Customer') {
       $select=$connection->prepare("SELECT *FROM customers WHERE Cust_id='".$_SESSION["Cust_id"]."'");
$select->execute();
foreach ($select as $row => $value) {
    $fname=$value["First_name"];
    $phone=$value["Telephone"];
    $lname=$value["Last_name"];
    $email=$value["E_mail"];
    $gender=$value["Gender"];
    $nationality=$value["Country"];
    $national_id=$value["National_id"];
    $username=$value["Username"];
    $password=$value["Password"];
    // $confirm=$value[""];
    $DOB=$value["Birth_date"];
    $staff_type=$value["User_type"];
    $address=$value["Address"];
    // $photo=$value["Photo"];
}
    

// }



// $img="../images_agakiriro/icons/User Group Man Woman_96px.png";
?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile </title>
    <link rel="stylesheet" href="../style/w3.css">
   <link rel="stylesheet" href="../style/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body style="background:#e6e6e6;color:black;">

<?php include 'side_bar.php';?>
<?php include 'header.php';?>
<div class="w3-container  w3-padding w3-padding-16 w3-center" style="margin-top: 70px;">
    <div class="w3-container w3-border w3-border-red s12 m8 l8 w3-light-grey " style="" >
    <div class="w3-content w3-margin-top w3-margin-bottom  " >
    <?php echo $notice;?>
        <div class=" w3-card-2  w3-center w3-round-xxlarge" style=""><h1> <b>Profile</b></h1></div>
        <form action="" method="POST" class="w3-card-4 w3-round-xxlarge " enctype="multipart/form-data" style="">
        <div class="w3-row" style="">  
                
            <div class="w3-col l8 m8 s12 w3-card-2  w3-padding-16 w3-container w3-margin w3-round-xxlarge" style="overflow-x:auto;overflow-y:auto;" >
                    <div class=" w3-col l5 m6 s12 w3-margin-right">
                            <div class="  w3-padding w3-round-xlarge w3-margin-right" style=""><label for="" class=""><b>First name</b>:</label></div>
                            <div class=""><input type="text" name="fname" class=" w3-input w3-round-xxlarge w3-border w3-border" style="" value="<?php echo $fname;?>" placeholder="First name it must be letters" pattern="[a-zA-Z -]+" ></div>
                    </div>
                    <div class="w3-col l5 m6 s12 ">
                            <div class="  w3-padding w3-round-xlarge w3-margin-right" style=""><label for="" class=""><b>Telephone</b>:</label></div>
                            <div class=""><input type="text" name="phone" class=" w3-input w3-round-xxlarge w3-border w3-border" style="" value="<?php echo $phone;?>" placeholder="enter your Phone number" pattern="[+ 0-9]+" ></div>
                    </div>
                    <div class="w3-col l5 m6 s12 w3-margin-right ">
                            <div class="  w3-padding w3-round-xlarge w3-margin-right" style=""><label for="" class=""><b>Last name</b>:</label></div>
                            <div class=""><input type="text" name="lname" class=" w3-input w3-round-xxlarge w3-border w3-border" style="" value="<?php echo $lname;?>" placeholder="Last name it must be letters" pattern="[a-zA-Z -]+" ></div>
                    </div>
                    <!--  -->
                    <div class="w3-col l5 m6 s12">
                            <div class="  w3-padding w3-round-xlarge w3-margin-right" style=""><label for="" class=""><b>E-mail</b>:</label></div>
                            <div class=""><input type="text" name="email" class=" w3-input w3-round-xxlarge w3-border w3-border" style="" value="<?php echo $email;?>" placeholder="enter your E-mail" pattern="[a-z]+[a-z 0-9]+[@]+[a-z]+[.]+[a-z]+"   readonly></div>
                    </div>
                    <div class="w3-col l5 m6 s12 w3-margin-right">
                            <div class="  w3-padding w3-round-xlarge w3-margin-right" style=""><label for="" class=""><b>Gender</b>:</label></div>
                            <div class=""><select  name="gender" class=" w3-input w3-round-xxlarge w3-border w3-border" style="" value="">
                            <option value="<?php echo $gender;?>"><?php echo $gender;?></option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            </select>
                            </div>
                    </div>
                    <div class="w3-col l5 m6 s12">
                            <div class="  w3-padding w3-round-xlarge w3-margin-right" style=""><label for="" class=""><b>Country</b>:</label></div>
                            <div class="">
                            <select name="nationality" class=" w3-input w3-round-xxlarge w3-border w3-border" style="" >
                            <option value="<?php echo $nationality;?>"><?php echo $nationality;?></option>
                            <option value="Rwandan">Rwanda</option>
                            <option value="DRC">DRC</option>
                            <option value="Kenya">Kenya</option>
                            <option value="Uganda">Uganda</option>
                            <option value="Tanzania">Tanzania</option>
                            <option value="Burundi">Burundi</option>
                            <option value="south sudan">south sudan</option>

                            </select>
                            </div>
                    </div>
                    <div class="w3-col l5 m6 s12 w3-margin-right ">
                            <div class="  w3-padding w3-round-xlarge w3-margin-right" style=""><label for="" class=""><b>National Id</b>:</label></div>
                            <div class=""><input type="text" name="national_id" class=" w3-input w3-round-xxlarge w3-border w3-border" style="" value="<?php echo $national_id;?>" placeholder="enter your national id" pattern="[0-9]+" ></div>
                    </div>
                    
                    <div class="w3-col l5 m6 s12">
                            <div class="  w3-padding w3-round-xlarge w3-margin-right" style=""><label for="" class=""><b>Username</b>:</label></div>
                            <div class=""><input type="text" name="username" class=" w3-input w3-round-xxlarge w3-border w3-border" style="" value="<?php echo $username;?>" placeholder="enter your username" pattern="[A-Z a-z @]+" ></div>
                    </div>
                    <div class="w3-col l5 m6 s12 w3-margin-right">
                            <div class="  w3-padding w3-round-xlarge w3-margin-right" style=""><label for="" class=""><b>Password</b>:</label></div>
                            <div class=""><input type="password" name="password" value="<?php echo $password;?>" class=" w3-input w3-round-xxlarge w3-border w3-border" placeholder="enter password" style=""  ></div>
                    </div>
                    <div class="w3-col l5 m6 s12">
                            <div class="  w3-padding w3-round-xlarge w3-margin-right" style=""><label for="" class=""><b>Confirm</b>:</label></div>
                            <div class=""><input type="password" name="confirm" value="<?php echo $password;?>" class=" w3-input w3-round-xxlarge w3-border w3-border" style=""  placeholder="enter your confirm password"></div>
                    </div>
                    
                     <div class="w3-col l5 m6 s12 w3-margin-right">
                            <div class="  w3-padding w3-round-xlarge w3-margin-right" style=""><label for="" class=""><b>Date of Birth</b>:</label></div>
                            <div class=""><input type="date" name="DOB" class=" w3-input w3-round-xxlarge w3-border w3-border" style="" value="<?php echo $DOB;?>"></div>
                    </div> 
                    <div class="w3-col l5 m6 s12 ">
                            <div class="  w3-padding w3-round-xlarge w3-margin-right" style=""><label for="" class=""><b>Address</b>:</label></div>
                            <div class=""><input type="text" name="address" class=" w3-input w3-round-xxlarge w3-border w3-border" style="" value="<?php echo $address;?>" placeholder="enter your Address" pattern="[a-zA-Z]+[a-zA-Z 0-9 ,]+" ></div>
                    </div>
                    
                      </div>
                     
                  <div class=" w3-col l3 m6 s12 w3-margin-top  w3-padding ">  
                         

                            <div class=" w3-col l12 m6 s12 w3-margin-top w3-margin-left w3-padding w3-black w3-card-4 w3-round-xxlarge">  
                          <div class=" w3-padding"> <h2 class="" ><strong style="">Welcome dear Customer You are more valuable to Us.</strong></h2> </div>
                    
                   
            </div>
            </div>
            <div class="w3-row w3-padding">
            <b><button  style="" class="w3-col l2 m2 s6 w3-btn w3-card-4 w3-margin w3-border w3-border-blue w3-round-xxlarge w3-grey w3-hover-green" name="update"><img src="../images_agakiriro/icons/save_as.ico" class="w3-margin-right">Update</button></b>
            <b><button style=""  class="w3-col l2 m2 s6 w3-btn w3-card-4 w3-border w3-border-blue w3-margin w3-red w3-round-xxlarge w3-hover-blue" name="cancel"><img src="../images_agakiriro/icons/Cancel.ico" class="w3-margin-right">Cancel</button></b>
         
        </div>
        
            </form>
        
        </div>
    </div>
</div>
</body>
</html>
<script>
    // previewing the image
    var loadfile=function(event){
        var output=document.getElementById("img_photo");
        output.src=URL.createObjectURL(event.target.files[0])
        output.onload=function(){
            URL.revokeObjectURL(output.src);
        };
    }
    
</script>