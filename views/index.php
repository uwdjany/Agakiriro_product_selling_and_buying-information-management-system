<?php 
include "../config/connection.php";
include"../controller/contact_ctr.php";
include"../controller/login_ctr_index.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agakiriro</title>
    <link rel="stylesheet" href="../style/w3.css">
    <link rel="stylesheet" href="../style/style1.css">
    <script type="text/javascript" src="../js/w3.js"></script>
    <link rel="stylesheet" href="../style/main.css">
    <link rel="stylesheet" href="../style/font-awesome/4.7.0/css/font-awesome.min.css">
    <style type="text/css">
      .igm:hover{
        border-radius:50px 0px 50px 0px;
      }
    </style>
</head>
<body>
<div class="w3-display-container w3-top" id="Home" style="">
  <div class="w3-bar w3-black w3-card">
    <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-left" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <strong class="w3-margin-left w3-hide-large w3-center ">Agakiriro online selling system</strong>
    <a href="#home" class="igm  w3-bar-item w3-button  w3-red w3-padding-large w3-hide-small">Home</a>
    <a href="#product" class="igm  w3-bar-item w3-button w3-red w3-padding-large w3-hide-small">Product</a>
    <a href="#contact" class="igm  w3-bar-item w3-button w3-red w3-padding-large w3-hide-small">Contact</a>
    <a href="#about" class="igm  w3-bar-item w3-button w3-red w3-padding-large w3-hide-small">About us</a>
    <a href="#login" class="igm  w3-bar-item w3-button w3-red w3-padding-large w3-hide-small">Login</a>
  </div>


<!-- Navbar on small screens -->
<div id="navDemo" class="w3-bar-block w3-black w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top: 46px;">
  <a href="#home" class="igm  w3-bar-item w3-button w3-red w3-padding-large w3-hide-small">Home</a>
  <a href="#services" class="igm  w3-bar-item w3-button w3-red w3-padding-large">Product</a>
  <a href="#contact" class="igm  w3-bar-item w3-button w3-red w3-padding-large">Contact</a>
  <a href="#about" class="igm  w3-bar-item w3-button w3-red w3-padding-large">About us</a>
  <a href="#login" class="igm  w3-bar-item w3-button w3-red w3-padding-large" >Logi</a>
</div>
</div>
<!-- this section is for big photos on large screen -->
<div class="w3-container w3-padding" id="home" style="margin-top: 50px; border:5px groove black;" >

   <div class=" slides" >
       <div><img src="../images_agakiriro/system_img/chairs.jpg" class="   w3-image w3-col l6 m6 s6 w3-animate-right "  style="height:700px;" ></div>
       <div><img src="../images_agakiriro/system_img/chairs1.jpg" class="  w3-image w3-col l6 m6 s6 w3-animate-left " style="height:700px;"></div>

        <div class=" w3-border  w3-center">
      <p class="w3-text-pink w3-hide-large w3-hide-medium"><strong class="w3-padding-large ">AGAKIRIRO ONLINE BUY AND SELLING SYSTEM</strong></p>
   </div>
    <div class="w3-display-container w3-border w3-display-middle w3-center">
        <h1 class="w3-text-pink w3-hide-small "><strong class="w3-padding">AGAKIRIRO ONLINE BUY AND SELLING SYSTEM</strong></h1>
   </div>
   </div>
  
	 <div class="slides" >
       <div><img src="../images_agakiriro/system_img/honda-portable-generators-500x500.jpg" class="  w3-image w3-col l6 m6 s6 w3-animate-right " style="height:700px;" ></div>
       <div><img src="../images_agakiriro/system_img/honda.jpg" class="  w3-image w3-col l6 m6 s6 w3-animate-left " style="height:700px;"></div>

        <div class="w3-display-container w3-border  w3-center">
      <p class="w3-text-pink w3-hide-large w3-hide-medium"><strong class="w3-padding-large ">AGAKIRIRO ONLINE BUY AND SELLING SYSTEM</strong></p>
   </div>
    <div class="w3-display-container w3-border w3-display-middle w3-center">
        <h1 class="w3-text-pink w3-hide-small "><strong class="w3-padding">AGAKIRIRO ONLINE BUY AND SELLING SYSTEM</strong></h1>
   </div>

   </div>

	 <div class="slides">
       <div><img src="../images_agakiriro/system_img/bed.jpg" class=" w3-image w3-col s6 w3-animate-right " style="height:700px;"></div>
       <div><img src="../images_agakiriro/system_img/mirror.jpg" class=" w3-image w3-col s6 w3-animate-left " style="height:700px;"></div>
         <div class="w3-display-container w3-border  w3-center">
      <p class="w3-text-pink w3-hide-large w3-hide-medium"><strong class="w3-padding-large ">AGAKIRIRO ONLINE BUY AND SELLING SYSTEM</strong></p>
   </div>
    <div class="w3-display-container w3-border w3-display-middle w3-center">
        <h1 class="w3-text-pink w3-hide-small "><strong class="w3-padding">AGAKIRIRO ONLINE BUY AND SELLING SYSTEM</strong></h1>
   </div>
   </div>
  </div> 
<!-- services deliver -->
<?php include"show_pro.php";

if(isset($_POST['all'])){
    try {
         if($_SESSION["Staff_type"]){
             echo"<script>document.location.href='selling_form.php'</script>";
            }
        else{
         echo"<script>document.location.href='index.php'</script>";
        }
    } 
    catch (Exception $e) {
        
    } 
}

?>
      
 <!--this is the contact form  -->
<div class="w3-black w3-container w3-margin-top w3-round-xlarge w3-padding" id="contact">
 <div class="w3-col l6 m6 s12 w3-black w3-padding" >
          <div class="w3-white">
        <div class=" w3-card-4  w3-card-2 w3-center" style=""><h1 class=""> <b>Contact Us</b></h1></div>
        <form action="" method="POST" class="  w3-card-4   " style="">
        <div class="w3-row" style=""> 
        <b><?php echo $notification;?></b>   
            <div class="w3-row w3-card-2 w3-container w3-margin-top w3-margin   w3-padding" style="overflow-x:auto;overflow-y:auto;" >
                    
            <div class=" w3-margin-left w3-margin-right">
                            <div class="  w3-padding w3-round-xlarge" style=""><label for="" class=""><b>E-mail</b>:</label></div>
                            <div class=""><input type="email" name="email" class="w w3-input w3-border w3-border" style="" value="" placeholder="enter your E-mail"></div>
                            <b><?php echo $email_err;?></b>
                    </div>
                    <div class="w3-row w3-margin-left">
                    <div class="w3-col s12"><div class="  w3-padding w3-round-xlarge" style=""><label for="" class=""><b>Subject</b>:</label></div>
                            <div class="w3-col s12"><input type="text" name="subject" class="  w3-input w3-border w3-border" style="" value="" placeholder="enter your subject"></div>
                            <b><?php echo $subject_err;?></b></div>

                            <div class="w3-col s12 l6 m6">
                            <div class="  w3-padding w3-round-xlarge " style=""><label for="" class=""><b>Write your ideas</b>:</label></div>
                            <div class=""><textarea type="text" name="content" class=" w3-input w3-border w3-border"  style="height:auto;" value="" placeholder="enter your ideas"></textarea></div>
                            <b><?php echo $content_err;?></b>
                    </div>
                    </div> 
            </div>
            </div>
            <div class="w3-row w3-container w3-margin-top w3-margin-bottom  w3-card-4">
            <button class="w3-button w3-margin w3-grey w3-card-4 w3-hover-pink w3-col l3 m3 s12" name="send"><i class="fa fa-send w3-hover-text-red w3-xlarge w3-margin-right" style="" ></i>Send</button>
            </div>
            </form>
        </div>
        </div>



 <div class="w3-margin-top">
  <div class="w3-col l6 m6 s12 w3-black w3-padding" style="">
<div class="w3-white w3-padding-large" id="login" style="
    background-image: url('images_agakiriro/system_img/computer3.jpg');
    background-size: 480px;
    background-repeat: no-repeat;
    background-position: center;
    height: 455px;
}">
  
    <!-- <button  class="w3-btn w3-xxlarge w3-hover-red " title="Close Modal"><i class="fa fa-close w3-xlarge"></i></button> -->
       <div class=" w3-card-4 w3-light-gray  w3-card-4 w3-center w3-round-xxlarge" style=""><h1 class="w3-text-xxlarge w3-text-red w3-center w3-round-xlarge"> login form</h1></div> 
        
        <form  method="POST" action="" class="w3-container w3-padding-large w3-round-xxlarge w3-margin w3-card-4 ">
          <?php echo $notice;?>
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
                      <input class=" fields w3-input w3-border " name="password" type="password" placeholder="Password"  autocomplete="off" />
                </div>
            </div>
          </div>
          
          <div class="w3-card-4">
              <div class="w3-margin-right w3-col l3 m4 s12"><button  name="connect" class="w3-btn w3-round-xxlarge w3-hover-grey w3-margin w3-green"><i class="fa fa-paper-plane-o w3-xlarge ">&nbsp;&nbsp; Connect</i></button></div>
              <div class="w3-col l3 m4 s12 w3-margin-left w3-margin-right"><a href="cust_account.php"  name="create" class="w3-btn w3-round-xxlarge w3-margin w3-hover-grey w3-pink "><i class="fa fa-edit w3-xlarge ">&nbsp;&nbsp; Sign up</i></a></div>
             <!--  <div class="w3-text-red w3-margin-left " hidden=""><a href="" class="w3-col l4 m4 s12 w3-hover-blue w3-round-xxlarge w3-margin " style=""><i class="fa fa-lock w3-xlarge w3-padding"></i>forgot password</a></div>  -->
          </div>
          
        </form>
      
        </div></div>


 </div>

       
        </div>
<!-- About Section -->
  <div class="w3-container w3-padding-32 w3-card-4 w3-light-gray" id="about">
    <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">About</h3>
    <p><strong>
      We are much honored to host you guys for any issues or problem that you may meet while experiencing this website; be open on it as it much more easier use and to understand; as it is described by it interfaces.
      this website is for selling and buying different products online and also by accepting electronic payment using your phone where ever you are; don't be complicated with time wastage; the only thing you want is to create account and start your journey by experiencing technology.
      Please contact us or those number beyonder the page on about section.</strong>
    </p>
  </div>

  <div class="w3-row-padding ">
    <div class="w3-col l3 m6 w3-margin-bottom">
      <img src="../images_agakiriro/system_img/User_48px.png" alt="djanati" style="width:100%">
      <h3>Uwase Djanati</h3>
      <p class="w3-opacity">CManager</p>
      <p>This is one is the chef and leader of agakiriro rubavu.</p>
      <div class="w3-grey w3-padding">
        <p>Number:+250784875126</p>
      <p>E-mail:agakirirorubavu@gmail.com</p>
      </div>
      
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <img src="../images_agakiriro/system_img/User_48px.png" alt="Jane" style="width:100%">
      <h3>Irumve</h3>
      <p class="w3-opacity">Staff</p>
      <p>This is one is the staff of agakiriro rubavu.</p>
      <div class="w3-grey w3-padding">
        <p>Number:+250780869412</p>
      <p>E-mail:agakirirorubavu@gmail.com</p>
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <img src="../images_agakiriro/system_img/User_48px.png" alt="Mike" style="width:100%">
      <h3>Mike Ross</h3>
      <p class="w3-opacity">Staff</p>
      <p>This is one is the staff of agakiriro rubavu.</p>
      <div class="w3-grey w3-padding">
        <p>Number:+250780000000</p>
      <p>E-mail:agakirirorubavu@gmail.com</p>
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <img src="../images_agakiriro/system_img/User_48px.png" alt="Dan" style="width:100%">
      <h3>Dan Star</h3>
      <p class="w3-opacity">Staff</p>
      <p>This is one is the staff of agakiriro rubavu.</p>
      <div class="w3-grey w3-padding">
        <p>Number:+250780000000</p>
      <p>E-mail:agakirirorubavu@gmail.com</p>
      </div>
    </div>
  </div>

<!-- this the footer -->
<div class=" w3-black w3-padding" ><center>Copy-rigt@2021-2022 ulk gisenyi campus</center></div>

</body>
</html>
<!-- <script src="js/slide.js"></script> -->
<script type="text/javascript">
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("slides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 3000);  
}
// Used to toggle the menu on small screens when clicking on the menu button
function myFunction() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>