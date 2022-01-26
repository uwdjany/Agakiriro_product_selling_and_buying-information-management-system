<?php
include"../controller/logout.php";
 include "../controller/item_reg_ctr_cust.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITEM REGISTRATION</title>
    <link rel="stylesheet" href="../style/w3.css">
    <link rel="stylesheet" href="../style/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body style="background:#e6e6e6;color:black;">

<?php include 'side_bar.php';?>
<?php include 'header.php';?>
<!-- this is the table that is showing items -->
<div class="w3-container  w3-padding w3-padding-16 w3-center" style="margin-top: 70px;">

    <div class=" w3-container w3-border w3-border-red  w3-light-grey">
    <div class="w3-content w3-margin-top w3-margin-bottom  ">
    
        <div class=" w3-card-4 w3-center w3-round-xxlarge"><h1> <b>ITEM REGISTRATION</b></h1></div>
        <form action="" method="POST" class="w3-border  w3-card-4 w3-round-xxlarge " enctype="multipart/form-data">
        <div class="w3-row">

    <?php echo $notice;?>
    <?php //echo $notification1;?>  
            <div class="w3-container w3-col l7 m8 s11  w3-round-xxlarge w3-margin" style="overflow-x:auto;overflow-y:auto; ">
                   
                    <div class="w3-row w3-margin">
                            <div class="w3-col w3-black w3-padding w3-round-xlarge w3-margin-right" style="width:150px;"><label for="" class=""><b>Type of Item</b>:</label></div>
                            <div class="w3-rest"><select  name="item_name" class=" w3-input w3-border w3-border" style="" >
                            <option value="">Select Item Name</option>
                            <option value="Freezer">Freezer</option>
                            <option value="Television">Television</option>
                            <option value="Cupboard">Cupboard</option>
                            <option value="Roof">Roof</option>
                            <option value="bed">bed</option>
                            <option value="Chair">Chair</option>
                            <option value="Arm_Chair">Arm Chair</option>
                            <option value="Dors">Dors</option>
                            <option value="Antenna">Antenna</option>
                            <option value="Wires">Wires</option>
                            <option value="Generator">Generator</option>
                            <option value="briefcase">briefcase</option>
                            <option value="Decoder">Decoder</option>
                            <option value="Porte_appareil">Porte appareil</option>
                            </select>
                            </div>
                    
                    </div>

                    <div class="w3-row w3-margin" style="">
                      <div class="w3-col w3-black w3-padding w3-round-xlarge w3-margin-right" style="width:150px;"> <label for="" class=""><b>Photo</b>:</label></div>
                      <div class="w3-rest" ><input type="file" accept="image/*" onchange="loadfile(event)" name="photo" class=" w3-input w3-border w3-border" style="" value="" ></div>
                    </div>
                    <div class="w3-row w3-margin" style="">
                      <div class="w3-col w3-black w3-padding w3-round-xlarge w3-margin-right" style="width:150px;"> <label for="" class=""><b>Items Cost</b>:</label></div>
                      <div class="w3-rest" ><input type="number" placeholder="Enter the Item Cost " min="0" name="amount" class=" w3-input w3-border w3-border" style="" value="<?php ?>" autocomplete="off"></div>
                    </div>
                    
            
             </div>
             <div class=" w3-col l4 m4 s11 w3-padding w3-margin" style="">  
                          <div class="w3-round-xxlarge">  <img  id="img_photo" src="<?php echo $image;?>"  class="w3-border w3-border-red  w3-margin-bottom" style="width:200px; height: 200px;" ></div>
                          
            </div>
            </div>
            <div class="w3-card-4 w3-round-xxlarge w3-padding-large w3-margin-top" style="margin-left: 235px;">
             <b><button  style="" class="w3-btn w3-card-4 w3-margin w3-border w3-border-blue w3-round-xxlarge w3-grey w3-hover-green" name="insert1"><img src="../images_agakiriro/icons/save_as.ico" class="w3-margin-right">Save</button></b>
            <b><button style="" name="cancel1" class="w3-btn w3-card-4 w3-border w3-border-blue w3-margin w3-red w3-round-xxlarge w3-hover-blue" name="search"><img src="../images_agakiriro/icons/Cancel.ico" class="w3-margin-right">Cancel</button></b>
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