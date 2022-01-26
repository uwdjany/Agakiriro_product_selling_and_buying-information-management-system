<div id="main" style="margin-left:250px">


<div class="w3-container w3-top  w3-green ">
  <div class="w3-margin-right w3-padding-right"><span title="open Sidebar" style="display:none" id="openNav" class="w3-button w3-transparent w3-grey  w3-display-topleft w3-xlarge " onclick="w3_open()">&#9776;</span></div>
  
  <div class="w3-container  w3-padding-left w3-black">
    <div class="w3-col l6 m6  w3-padding-16 w3-center w3-hide-small" style="margin-left: 150px;"><strong class="h3" style="">AGAKIRIRO ONLINE BUYING AND SELLING PRODUCTS</strong></div>
    <div class="w3-col l6 m6 s10 w3-padding-16 w3-center w3-hide-large" style="margin-left: 80px;"><strong class="h3" style="">AGAKIRIRO ONLINE BUYING AND SELLING PRODUCTS</strong></div>

    <?php

    if($_SESSION["User_type"]=="Customer"){
    
    echo'<div class="w3-col l3 m3 s3 w3-padding w3-right" style="margin-right: 60px;">
       
      <strong class="w3-padding h3 w3-hide-small" style=" ">WELCOME  '. $_SESSION["First_name"].' '.$_SESSION["Last_name"].'</strong>
       </div>'; 
       }

    elseif($_SESSION["User_type"]=="Staff"||$_SESSION["User_type"]=="Manager"){
       echo'<div class="w3-col l3 m3 s3 w3-padding w3-right" style="margin-right: 60px;">
       <strong class="w3-padding h3 w3-hide-small">'. $_SESSION["First_name"].' '.$_SESSION["Last_name"].'</strong><img src='.$_SESSION["Photo"].' class="w3-circle img6 w3-hide-small" style="width: 50px;height: 50px; border: solid 1px white;"/></div>';
        }

    ?>

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