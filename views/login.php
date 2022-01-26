<?php
require_once("../config/connection.php");
include"../controller/login_ctr.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<link rel="stylesheet" href="../style/w3.css">
    <link rel="stylesheet" href="../style/style1.css">
    <script type="text/javascript" src="../js/w3.js"></script>
    <link rel="stylesheet" href="../style/main.css">
    <link rel="stylesheet" href="../style/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="w3-col l6 m12 s12 w3-black w3-padding-all w3-display-middle" style="">
<div class="w3-white w3-padding-large" id="login" style="
    background-image: url('images_agakiriro/system_img/computer3.jpg');
    background-size: 480px;
    background-repeat: no-repeat;
    background-position: center;
    height: 455px;
}">
  
    <!-- <button  class="w3-btn w3-xxlarge w3-hover-red " title="Close Modal"><i class="fa fa-close w3-xlarge"></i></button> -->
       <div class=" w3-card-4 w3-light-gray  w3-card-4 w3-center w3-round-xxlarge" style=""><h1 class="w3-text-xxlarge w3-text-red w3-center w3-round-xlarge"> login form</h1></div> 
        <?php echo $notice;?>
        <form  method="POST" action="" class="w3-container w3-padding-large w3-round-xxlarge w3-margin w3-card-4 ">
          <div><p class="logimg w3-image w3-circle w3-center"></p></div>
          <div class="w3-card-4 w3-padding-large w3-margin">
                <div class="w3-row w3-margin  w3-round-xxlarge w3-center" style="">
                      <div class="icon w3-col w3-light-gray " ><i class="w3-xxlarge fa fa-user w3-text-blue"></i></div>
                        <div class="w3-rest">
                        <input class=" fields w3-input w3-border  w3-opacity" name="username" type="text" placeholder="UserName" />
                      </div>
                </div>

                <div class="w3-row w3-margin  w3-round-xlarge w3-center">
                      <div class="icon w3-col w3-light-gray "><i class="w3-xxlarge fa fa-key w3-text-orange"></i></div>
                       <div class="w3-rest">
                      <input class=" fields w3-input w3-border " name="password" type="text" placeholder="Password"  />
                </div>
            </div>
          </div>
          
           <div class="w3-card-4 w3-margin">
              <div class="w3-margin "><button  name="connect" class="w3-btn w3-col l3 m4 s12 w3-round-xxlarge w3-hover-grey w3-margin w3-green "><i class="fa fa-paper-plane-o w3-xlarge ">&nbsp;&nbsp; Connect</i></button></div>

              <div class="w3-margin"><a href="views/cust_account.php"  name="create" class="w3-col l3 m4 s12 w3-btn w3-round-xxlarge w3-margin w3-hover-grey w3-pink "><i class="fa fa-edit w3-xlarge ">&nbsp;&nbsp; Sign up</i></a></div>

              <div class="w3-text-blue" hidden=""><a href="" class="w3-col l4 m6 s12 w3-hover-text-red  w3-margin " style="text-decoration: none;"><i class="fa fa-lock w3-xlarge w3-padding"></i><strong class="">forgot password</strong></a></div> 
          </div>
          
        </form>
      
        </div></div>


</body>
</html>