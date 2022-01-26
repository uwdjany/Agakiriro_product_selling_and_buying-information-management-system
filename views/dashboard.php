<?php include '../controller/logout.php';
// session_start();
?>
<!DOCTYPE html>
<html>
<!-- Mirrored from www.w3schools.com/w3css/demo_ifr_sidebar.htm by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Feb 2018 09:10:02 GMT -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../style/w3.css">
<link rel="stylesheet" href="../style/font-awesome.min.css">
<link rel="stylesheet" href="../style/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Dashboard</title>
<style>
@media screen and (max-width: 455px) {
    .h3 {
        font-size:8px;
    }

}

</style>

<body style="background:#e6e6e6;color:black;">

<div class="w3-sidebar w3-light-grey w3-card-4 w3-animate-left" style="width:250px" id="mySidebar">
  <div class="w3-bar w3-dark-grey">
  <span class="w3-bar-item w3-padding-16"><img src="../images_agakiriro/icons/Dashboard.ico" class="w3-margin-right" />Dashboard </span>
  <button onclick="w3_close()"
  class="w3-bar-item w3-button w3-right w3-black w3-padding-16" title="close Sidebar">&times;</button>
  </div>
  <div class="w3-bar-block w3-black">
  	<form action="" method="GET">

      <?php
                 if ($_SESSION["Staff_type"]=="Manager") {
                  
                  ?> <button class="w3-bar-item w3-button" name="profile" ><img src="../images_agakiriro/icons/Gender_Neutral_User.ico" class="w3-margin-right" />Profile</button> 
                    <button class="w3-bar-item w3-button"  name="account_staff"><img src="../images_agakiriro/icons/Add_User_Group_Man_Man_1.ico" class="w3-margin-right"
                   >Register Staffs</button> 
                  <button  class="w3-bar-item w3-button" name="sell_item" ><img src="../images_agakiriro/icons/Money_Bag.ico" class="w3-margin-right" />Sell items</button>
                  <a href="selling_form.php"  class="w3-bar-item w3-button" name="buy_item"><img src="../images_agakiriro/icons/buy.ico" class="w3-margin-right" />Buy Items</a>
                  <button  class="w3-bar-item w3-button" name="product_accept"><img src="../images_agakiriro/icons/settings_3.ico" class="w3-margin-right" />Product acceptance</button>  
                  <button  class="w3-bar-item w3-button" name="buy_status"><img src="../images_agakiriro/icons/Todo_list.ico" class="w3-margin-right" />Buying Status</button> 
                  <button  class="w3-bar-item w3-button" name="sell_status"><img src="../images_agakiriro/icons/Purchase_Order.ico" class="w3-margin-right" />Selling Status</button> 
                  <button  class="w3-bar-item w3-button" name="Employees"><img src="../images_agakiriro/icons/User_Group_Man_Woman.ico" class="w3-margin-right" />Staffs</button> 
                  <button  class="w3-bar-item w3-button" name="customer"><img src="../images_agakiriro/icons/User_Groups_2.ico" class="w3-margin-right" />Customers</button> 
                    
                  <button  class="w3-bar-item w3-button" name="items"><i class="fa fa-braille w3-text-red users w3-xxlarge w3-margin-right "></i>items</button> 
                  <!-- <a class="w3-bar-item w3-button" href="javascript:void(0)"></a> -->
                  <button class="w3-bar-item w3-button" name="logt"><img src="../images_agakiriro/icons/Close_window.ico" class="w3-margin-right" />Logout</button>
               <?php }

                 elseif ($_SESSION["Staff_type"]=="Staff") {
                   ?>
                      <button class="w3-bar-item w3-button" name="profile"><img src="../images_agakiriro/icons/Gender_Neutral_User.ico" class="w3-margin-right" />Profile</button> 
                      <button  class="w3-bar-item w3-button" name="buy_item"><img src="../images_agakiriro/icons/buy.ico" class="w3-margin-right" />Buy Items</button> 
                      <button  class="w3-bar-item w3-button" name="sell_item"><img src="../images_agakiriro/icons/Money_Bag.ico" class="w3-margin-right" />Sell items</button>
                       <button  class="w3-bar-item w3-button" name="product_accept"><img src="../images_agakiriro/icons/settings_3.ico" class="w3-margin-right" />Product acceptance</button> 
                      <button  class="w3-bar-item w3-button" name="buy_status"><img src="../images_agakiriro/icons/Todo_list.ico" class="w3-margin-right" />Buying Status</button> 
                      <button  class="w3-bar-item w3-button" name="sell_status"><img src="../images_agakiriro/icons/Purchase_Order.ico" class="w3-margin-right" />Selling Status</button>
                      <button class="w3-bar-item w3-button" name="logt"><img src="../images_agakiriro/icons/Close_window.ico" class="w3-margin-right" />Logout</button>
                   
                  <?php  }
                elseif($_SESSION["Staff_type"]=="Customer"){
                    ?>
                      <button class="w3-bar-item w3-button" name="profile"><img src="../images_agakiriro/icons/Gender_Neutral_User.ico" class="w3-margin-right" />Profile</button> 
                      <button  class="w3-bar-item w3-button" name="buy_item"><img src="../images_agakiriro/icons/buy.ico" class="w3-margin-right" />Buy Items</button> 
                      <button  class="w3-bar-item w3-button" name="sell_item"><img src="../images_agakiriro/icons/Money_Bag.ico" class="w3-margin-right" />Sell items</button>
                      <button  class="w3-bar-item w3-button" name="buy_status"><img src="../images_agakiriro/icons/Todo_list.ico" class="w3-margin-right" />Buying Status</button> 
                      <button  class="w3-bar-item w3-button" name="sell_status"><img src="../images_agakiriro/icons/Purchase_Order.ico" class="w3-margin-right" />Selling Status</button>
                      <button class="w3-bar-item w3-button" name="logt"><img src="../images_agakiriro/icons/Close_window.ico" class="w3-margin-right" />Logout</button>

              <?php  }
                ?>
  <!-- <a class="w3-bar-item w3-button w3-green" href="javascript:void(0)">Home</a> -->
  
  </form>
  </div>
</div>

<div id="main" style="margin-left:250px">


<div class="w3-container w3-top  w3-green ">
  <div class="w3-margin-right w3-padding-right"><span title="open Sidebar" style="display:none" id="openNav" class="w3-button w3-transparent w3-grey  w3-display-topleft w3-xlarge " onclick="w3_open()">&#9776;</span></div>
  
  <div class="w3-container  w3-padding-left w3-black">
    <div class="w3-col l6 m6  w3-padding-16 w3-center w3-hide-small" style="margin-left: 150px;"><strong class="h3" style="">AGAKIRIRO ONLINE BUYING AND SELLING PRODUCTS</strong></div>
    <div class="w3-col l6 m6 s10 w3-padding-16 w3-center w3-hide-large" style="margin-left: 80px;"><strong class="h3" style="">AGAKIRIRO ONLINE BUYING AND SELLING PRODUCTS</strong></div>
    <div class="w3-col l3 m3 s3 w3-padding w3-right" style="margin-right: 60px;">
       
      <strong class="w3-padding h3 w3-hide-small" style=" "><?php echo $_SESSION["First_name"]."  ".$_SESSION["Last_name"];?></strong>
      <img src='<?php echo $_SESSION["Photo"]; ?>' class="w3-circle img6 w3-hide-small" style="width: 50px;height: 50px; border: solid 1px white;" />     
    </div>

  </div>
  
</div>

<div class="w3-container  w3-padding w3-padding-16 w3-center" style="margin-top: 70px;">
<?php
                 // if (isset($_GET["profile"])) {
                 //    include"profile.php";
                   
                 // }
                 //  elseif (isset($_GET["product_accept"])) {
                 //    include"item_confirmation.php";
                   
                 // } 
                 // elseif(isset($_GET["sell_item"])){
                 // include"item_reg.php";

                 // }
                 // elseif(isset($_GET["buy_status"])){
                 // include"buying_status.php";
                 // }
                 // elseif(isset($_GET["account_staff"])){
                 // include"staffs_account.php";
                 // }
                 // elseif(isset($_GET["sell_status"])){
                 // include"selling_status.php";
                 // }
                 
                 // else{
                 //   include"profile.php";
                 // }
                 
?>
</div>

</div>
</div>

<script>
function w3_open() {
  document.getElementById("main").style.marginLeft = "250px";
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("openNav").style.display = 'none';
}
function w3_close() {
  document.getElementById("main").style.marginLeft = "0";
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("openNav").style.display = "inline-block";
}
</script>
      
</body>

<!-- Mirrored from www.w3schools.com/w3css/demo_ifr_sidebar.htm by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Feb 2018 09:10:02 GMT -->
</html> 