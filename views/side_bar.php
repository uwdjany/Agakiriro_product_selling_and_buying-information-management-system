<?php
include"../config/connection.php";
$select=$connection->prepare("SELECT COUNT(`Email`) as Total_of_Email FROM `message` WHERE readState='Unread'");
$select->execute();
foreach($select->fetchAll() as $row){
   
   $notif="<label class='w3-red w3-round-xxlarge w3-padding'>".$row['Total_of_Email']."</label>";
}
?>
<div class="w3-sidebar w3-light-grey w3-card-4 w3-animate-left" style="width:250px" id="mySidebar">
  <div class="w3-bar w3-dark-grey">
  <span class="w3-bar-item w3-padding-16"><img src="../images_agakiriro/icons/Dashboard.ico" class="w3-margin-right" />Dashboard </span>
  <button onclick="w3_close()"
  class="w3-bar-item w3-button w3-right w3-black w3-padding-16" title="close Sidebar">&times;</button>
  </div>
  <div class="w3-bar-block w3-black">
  	<form action="" method="GET">

      <?php
                 if ($_SESSION["User_type"]=="Manager") {
                  
                  ?>
                     <a href="profile.php" class="w3-bar-item w3-button" name="profile"><img src="../images_agakiriro/icons/Gender_Neutral_User.ico" class="w3-margin-right" />Profile</a> 
                     <a href="staffs_account.php" class="w3-bar-item w3-button"  name="account_staff"><img src="../images_agakiriro/icons/Add_User_Group_Man_Man_1.ico" class="w3-margin-right"
                   >Register Staffs</a>

                      <a href="message.php" name="view_mes" class="w3-bar-item w3-button"><i class="fa fa-envelope-o w3-xlarge w3-margin-right w3-text-red"></i>Message <?php echo $notif; ?></a> 
                      <a  href="selling_form.php" class="w3-bar-item w3-button" name="buy_item"><img src="../images_agakiriro/icons/buy.ico" class="w3-margin-right" />Buy Item(s)</a> 
                      <a  href="item_reg.php" class="w3-bar-item w3-button" name="sell_item"><img src="../images_agakiriro/icons/Money_Bag.ico" class="w3-margin-right" />Sell item(s)</a>
                       <a  href="item_confirmation.php" class="w3-bar-item w3-button" name="product_accept"><img src="../images_agakiriro/icons/settings_3.ico" class="w3-margin-right" />Product acceptance</a> 
                      <a  href="buying_status.php" class="w3-bar-item w3-button" name="buy_status"><img src="../images_agakiriro/icons/Todo_list.ico" class="w3-margin-right" />Buying Status</a> 
                      <a  href="selling_status.php" class="w3-bar-item w3-button" name="sell_status"><img src="../images_agakiriro/icons/Purchase_Order.ico" class="w3-margin-right" />Selling Status</a>
                      <a href="users_accounts_views.php" class="w3-bar-item w3-button" name="customer"><img src="../images_agakiriro/icons/User_Groups_2.ico" class="w3-margin-right" />Staffs</a> 
                      <a href="views_customers.php" class="w3-bar-item w3-button" name="customer"><img src="../images_agakiriro/icons/User_Groups_2.ico" class="w3-margin-right" />Customers</a> 
                       <a href="items_views.php" class="w3-bar-item w3-button" name="items"><i class="fa fa-braille w3-text-red users w3-xxlarge w3-margin-right "></i>items</a>  
                       <a href="views_billings.php" class="w3-bar-item w3-button" name=""><i class="fa fa-money w3-text-red users w3-xxlarge w3-margin-right "></i>Views Bills</a>  
                       <button class="w3-bar-item w3-button" name="logt"><img src="../images_agakiriro/icons/Close_window.ico" class="w3-margin-right" />Logout</button>
               <?php }

                 elseif ($_SESSION["User_type"]=="Staff") {
                   ?>
                      <a href="profile.php" class="w3-bar-item w3-button" name="profile"><img src="../images_agakiriro/icons/Gender_Neutral_User.ico" class="w3-margin-right" />Profile</a> 
                      <a href="message.php" name="view_mes" class="w3-bar-item w3-button"><i class="fa fa-envelope-o w3-xlarge w3-margin-right w3-text-red"></i>Message <?php echo $notif; ?></a> 
                      <a  href="selling_form.php" class="w3-bar-item w3-button" name="buy_item"><img src="../images_agakiriro/icons/buy.ico" class="w3-margin-right" />Buy Items</a> 
                      <a  href="item_reg.php" class="w3-bar-item w3-button" name="sell_item"><img src="../images_agakiriro/icons/Money_Bag.ico" class="w3-margin-right" />Sell item(s)</a>
                       <a  href="item_confirmation.php" class="w3-bar-item w3-button" name="product_accept"><img src="../images_agakiriro/icons/settings_3.ico" class="w3-margin-right" />Product acceptance</a> 
                      <a  href="buying_status.php" class="w3-bar-item w3-button" name="buy_status"><img src="../images_agakiriro/icons/Todo_list.ico" class="w3-margin-right" />Buying Status</a> 
                      <a  href="selling_status.php" class="w3-bar-item w3-button" name="sell_status"><img src="../images_agakiriro/icons/Purchase_Order.ico" class="w3-margin-right" />Selling Status</a>
                      <button class="w3-bar-item w3-button" name="logt"><img src="../images_agakiriro/icons/Close_window.ico" class="w3-margin-right" />Logout</button>
                   
                  <?php  }
                elseif($_SESSION["User_type"]=="Customer"){
                    ?>
                      <a href="profile_cust.php" class="w3-bar-item w3-button" name="profile"><img src="../images_agakiriro/icons/Gender_Neutral_User.ico" class="w3-margin-right" />Profile</a> 
                      <a href="selling_form_cust.php"  class="w3-bar-item w3-button" name="buy_item"><img src="../images_agakiriro/icons/buy.ico" class="w3-margin-right" />Buy Items</a> 
                      <a href="item_reg_cust.php"  class="w3-bar-item w3-button" name="sell_item"><img src="../images_agakiriro/icons/Money_Bag.ico" class="w3-margin-right" />Sell item(s)</a>
                      <a href="buying_status.php"  class="w3-bar-item w3-button" name="buy_status"><img src="../images_agakiriro/icons/Todo_list.ico" class="w3-margin-right" />Buying Status</a> 
                      <a href="selling_status.php"  class="w3-bar-item w3-button" name="sell_status"><img src="../images_agakiriro/icons/Purchase_Order.ico" class="w3-margin-right" />Selling Status</a>
                      <button class="w3-bar-item w3-button" name="logt"><img src="../images_agakiriro/icons/Close_window.ico" class="w3-margin-right" />Logout</button>

              <?php  }
                ?>
  
  </form>
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