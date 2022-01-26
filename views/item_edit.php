<?php 
include"../config/connection.php";
session_start();
$notice="";
        if (isset($_GET["edit"])) { 
             $item_id=$_GET["Item_id"];

            $select=$connection->prepare("SELECT * FROM products WHERE Item_id='$item_id'");
            $select->execute();
            foreach ($select->fetchAll() as $row) {
               $item_type=$row["Item_type"];
               $item_cost=$row["Item_cost"];
               $image=$row["Item_photo"];
                 }
           
            if (isset($_POST["Edit"])) {// this button is located onthe form bellow
                include '../controller/item_photo_upload.php';
                
                $item_type1=$_POST["item_name"];
                $item_cost1=$_POST["amount"];
                if (!empty($item_type1)&&!empty($item_cost1)&& empty($photo)) {
                   
                   $upd="UPDATE products SET Item_type='$item_type1', Item_cost='$item_cost1' WHERE Item_id='$item_id' AND Status!='Confirmed'";
                     $connection->exec($upd);
                
                    $notice="<script>alert('You have Update The Item without photo number NMBR_'+$item_id)</script>";
                    echo $notice."<script>document.location.href='selling_status.php';</script>";
 
                   
                }
                 else{
                    
                   $upd="UPDATE products SET Item_type='$item_type1', Item_cost='$item_cost1',Item_photo='$photo' WHERE Item_id='$item_id' AND Status!='Confirmed'";
                    $connection->exec($upd);
                
                    $notice="<script>alert('You have Update  The Item within a photo number NMBR_'+$item_id)</script>";
                   echo $notice."<script>document.location.href='selling_status.php';</script>";


                }     
            }
            elseif (isset($_POST["close"])) {
                $notice="<script>alert('You have closed it successfully')</script>";
                   echo $notice."<script>document.location.href='selling_status.php';</script>";
            }
            
             // include"item_edit.php";

                                                                      } 
        elseif (isset($_GET["delete"])) {

                                                                  }
                                                                  ?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit</title>
    <link rel="stylesheet" href="../style/w3.css">
    <!-- <link rel="stylesheet" href="../style/font-awesome.min.css"> -->
    <link rel="stylesheet" href="../style/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body style="background:#e6e6e6;color:black;">
    <?php include 'side_bar.php';?>
<?php include 'header.php';?>
<div class="w3-container  w3-padding w3-padding-16 w3-center" style="margin-top: 70px;">
    <div class=" w3-container w3-border w3-border-red  w3-light-grey">
    <div class="w3-content w3-margin-top w3-margin-bottom  ">
    
        <div class=" w3-card-4 w3-center w3-round-xxlarge"><h1> <b>ITEM EDIT</b></h1></div>
        <form action="" method="POST" class="w3-border  w3-card-4 w3-round-xxlarge " enctype="multipart/form-data">
        <div class="w3-row">

    <?php echo $notice;?>
    <?php //echo $notification1;?>  
            <div class="w3-container w3-col l7 m8 s11  w3-round-xxlarge w3-margin" style="overflow-x:auto;overflow-y:auto; ">
                   
                    <div class="w3-row w3-margin">
                            <div class="w3-col w3-black w3-padding w3-round-xlarge w3-margin-right" style="width:150px;"><label for="" class=""><b>Type of Item</b>:</label></div>
                            <div class="w3-rest"><select  name="item_name" class=" w3-input w3-border w3-border" style="" >
                            <option value="<?php echo $item_type;?>"><?php echo $item_type;?></option>
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
                      <div class="w3-rest" ><input type="number" placeholder="Enter the Item Cost " min="0" name="amount" class=" w3-input w3-border w3-border" style="" value="<?php echo $item_cost;?>" autocomplete="off"></div>
                    </div>
                    
            
             </div>
             <div class=" w3-col l4 m4 s11 w3-padding w3-margin" style="">  
                          <div class="w3-round-xxlarge">  <img  id="img_photo" src="<?php echo $image;?>"  class="w3-border w3-border-red  w3-margin-bottom" style="width:200px; height: 200px;" ></div>
                          
            </div>
            </div>
            <div class="w3-row w3-middle w3-card-4 w3-round-xxlarge w3-padding-large w3-margin-top" style="">
             <b><button  style="" class="w3-btn w3-card-4 w3-margin w3-border w3-border-blue w3-round-xxlarge w3-grey w3-hover-green" name="Edit"><img src="../images_agakiriro/icons/save_as.ico" class="w3-margin-right">Edit</button></b>
            <b><button  style=""  class="w3-btn w3-card-4 w3-border w3-border-blue w3-margin w3-red w3-round-xxlarge w3-hover-blue" name="close"><img src="../images_agakiriro/icons/Cancel.ico" class="w3-margin-right">close</button></b>
            </div>
            </form>
        
        </div>
    </div>

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
</body>
</html>

