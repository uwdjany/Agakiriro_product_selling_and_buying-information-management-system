<?php
include "../config/connection.php";
include '../controller/logout.php';
$row="";
$sta="";
$TOTAL=0;
$count=0;
$notice="";
$item_cost="";
$name=$_SESSION["First_name"]."_".$_SESSION["Last_name"];
    if(isset($_POST['add_cart'])){
    if(isset($_SESSION['cart'])){

        $session_array_id=array_column($_SESSION['cart'], "item_id");


        if(!in_array($_GET['item_id'], $session_array_id)){// if the item is not added on the carting table. let's add it. 

                $session_array=array(
            "item_id"=>$_GET["item_id"],
            "item_type"=>$_POST["item_type"],
            "item_cost"=>$_POST["item_cost"],
            "e_mail"=>$_POST["e_mail"],
            "telephone"=>$_POST["telephone"],
            "Buyer_E_mail"=>$_SESSION["E_mail"],
            "Buyer_Telephone"=>$_SESSION["Telephone"],
            "item_phot"=>$_POST["item_photo"],
            "Buyer_name"=>$name,
            "Buyer_id"=>$_SESSION["Cust_id"]
            );
                $_SESSION['cart'][]=$session_array;
                // $count++;

        }

    }
    else{ // add item in the carting table
        $session_array=array(
            "item_id"=>$_GET["item_id"],
            "item_type"=>$_POST["item_type"],
            "item_cost"=>$_POST["item_cost"],
            "e_mail"=>$_POST["e_mail"],
            "telephone"=>$_POST["telephone"],
            "Buyer_E_mail"=>$_SESSION["E_mail"],
            "Buyer_Telephone"=>$_SESSION["Telephone"],
            "item_phot"=>$_POST["item_photo"],
            "Buyer_name"=>$name,
            "Buyer_id"=>$_SESSION["Cust_id"]);
        $_SESSION['cart'][]=$session_array;
        // $count++;

    }
}

elseif (isset($_POST["buy_item"])) {
     $item_id=$_GET["item_id"];
     $item_type=$_POST["item_type"];
     $item_cost=$_POST["item_cost"];
     $e_mail=$_POST["e_mail"];
     $telephone=$_POST["telephone"];
     $Buyer_E_mail=$_SESSION["E_mail"];
     $Buyer_Telephone=$_SESSION["Telephone"];
     $item_phot=$_POST["item_photo"];
     $Buyer_name=$name;
     $Buyer_id=$_SESSION["Cust_id"];

     ?>
    <form>
  <script src="https://checkout.flutterwave.com/v3.js"></script>
  <!-- <button type="button" onClick="makePayment()">Pay Now</button> -->
</form>

<script>
  // function makePayment() {
    FlutterwaveCheckout({
                                public_key: "FLWPUBK-a524003832fa24ac16fdb083141546bd-X",
                                tx_ref: "nyj_"+Math.floor((Math.random()*100000000)+1),
                                amount: <?php echo $item_cost;?>,
                                currency: "RWF",
                                country: "RW",
                                payment_options: "card,mobilemoney,ussd",
                                customer: {
                                  email: "<?php echo $Buyer_E_mail;?>",
                                  phone_number: "<?php echo $Buyer_Telephone;?>",
                                  name: "<?php echo $Buyer_name;?>",
      },
      callback: function (data) { // specified callback function
        console.log(data);
      },
      customizations: {
         title: "AGAKIRIRO",
        description: "ONLINE AGAKIRIRO BUYING AND SELLING SYSTEM",
        logo: "https://assets.piedpiper.com/logo.png",
      },
    });
  // }
</script>
<?php
 $row20="";
 $purchased="";
    $query="INSERT INTO `purchased`( `Item_id`,`Item_type`, `Item_cost`, `Owner_Email`,`Owner_Telephone`, `Buyer_id`, `Buyer_names`, `Buyer_E_mail`, `Buyer_Telephone`, `payment_type`, `Buy_date`, `Item_photo`)
                                VALUES('$item_id','$item_type','$item_cost','$e_mail','$telephone','$Buyer_id','$name','$Buyer_E_mail','$Buyer_Telephone','MOBILE MONEY',Now(),'$item_phot')";

    if($connection->exec($query)){

       $select=$connection->prepare("SELECT *FROM `purchased` WHERE Item_id='$item_id'");
      $select->execute();
      foreach($select->fetchAll() as $row20){
        $purchased=$row20["Purchase_id"];
        
        
      }


      $bill="INSERT INTO `billing_tb`(`Buyer_id`,`Purchase_id`,`Buyer_email`, `Buyer_names`, `Item_id`, `Item_type`, `Item_cost`,`Payment_type`, `Issued_date`) VALUES('$Buyer_id','$purchased','$Buyer_E_mail','$name','$item_id','$item_type','MOBILE MONEY','$item_cost',Now())";
      if ($connection->exec($bill)) {
      echo "<script>alert('The item to be bought be ready to go on. then you will receive bill on whats app ,email, and phone sms after that be ready to get your item bought'+$item_cost)</script>";
      
      } else {
        echo "<script>alert('Excuse Dear No Try it again!!'+$item_cost)</script>";
      }
      
        

           $upd="UPDATE products SET Status='Bought' WHERE Item_id='$item_id'";
                    $connection->exec($upd);
                
                    $notice="<script>alert('Wait for online payment inorder to get youR item bought!!')</script>";
                   echo $notice;


    }
    else{
        echo "<script>alert(' Fail to Inserted !!')</script>";
    }

    
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy items</title>
      <link rel="stylesheet" href="../style/w3.css">
      <link rel="stylesheet" href="../style/main.css">
      <link rel="stylesheet" href="../style/font-awesome.min.css">
      <link rel="stylesheet" href="../style/font-awesome/4.7.0/css/font-awesome.min.css">
     

<style type="text/css">
    .image:hover{
        width: 150%;
        height: auto;
    }
</style>
</head>
</style>
<body style="background:#e6e6e6;color:black;">

<?php include 'side_bar.php';?>
<?php include 'header.php';?>
<!-- this is the table that is showing items -->
<div class="w3-container  w3-padding w3-padding-16 w3-center" style="margin-top: 70px;">

    <?php echo $notice;?>
    <div class="w3-container w3-padding-large w3-black">
        <div class="w3-right" style="">WHEN YOU CLICK ON ADD TO CART THE LEFT ICON HAVING 0 WILL CHANGE AND GET NUMBER OF ITEMS ADDED    <button class="w3-btn w3-pointer w3-white w3-round-xxlarge"
         onclick="document.getElementById('carting_table').style.display='block'" style="margin-top: 10px;"><img src="../images_agakiriro/icons/Shopping_Cart_Loaded.ico" /></button><label id='count' class="w3-red w3-center w3-round-xxlarge w3-xlarge" style="margin-left: -15px; "></lable></div> 
    </div>
 <div class="w3-container w3-padding-large " style="">
    

 <div class="w3-margin ">
<?php
            $rowperpage = 8;// number of Items per page
            $pageno = 0;
            $allcount=0;
            // Previous Button


            if(isset($_POST['first'])){// return to the first page
                $pageno = $_POST['pageno'];
                // $pageno -= $rowperpage;
                if( $pageno > 0 ){
                    $pageno = 0;
                }
            }
            if(isset($_POST['prev'])){//return to the previors page
                $pageno = $_POST['pageno'];
                $pageno -= $rowperpage;
                if( $pageno < 0 ){
                    $pageno = 0;
                }
            }

            // Next Button
            if(isset($_POST['next'])){ // go to the next page
                $pageno = $_POST['pageno'];
                $allcount = $_POST['allcount'];
                $val = $pageno + $rowperpage;
                if( $val < $allcount ){
                    $pageno = $val;
                }
            }
             if(isset($_POST['last'])){ // go to the last page
                
                 $pageno = $_POST['pageno'];
                $allcount = $_POST['allcount'];
                
               $pageno = $allcount-1; // go to the last image 

            }

$sql = "SELECT COUNT(*) FROM products WHERE Status='Confirmed'";
            $result = $connection->query($sql);
            $fetchresult = $result->fetchColumn();
            $allcount = $fetchresult;
            // selecting rows
            $sql1 = $connection->prepare("SELECT * FROM products WHERE Status='Confirmed' limit $pageno,$rowperpage");
            $sql1->execute();
            $sql1->setFetchMode(PDO::FETCH_ASSOC);
            $sno = $pageno+ 1;
            $slct1=$sql1->fetchAll();
            if ($slct1) {
             
            foreach($slct1 as $row){
                $_SESSION["img"]=$row["Item_photo"];
?>
<form action="selling_form_cust.php?item_id=<?=$row['Item_id']?>" method="post" class=" w3-col s12 l3 m4 "
 enctype="multipart/form-data" style="">
	
    <div class='w3-card-4 w3-light-grey w3-padding w3-margin' style=''>
        <div class=""><img class='image w3-round-xxlarge  w3-padding' name='pht' src='<?php echo $row["Item_photo"];?>' style="width: 100%;height: 200px; "></div>

        <div class="w3-padding"><label><b class=' w3-left w3-margin-left' style="">Name:</b></label><label class='w3-text-red '><b><?php echo $row['Item_type'];?></b></label></div>
        <div class="w3-padding"><b class=' w3-left w3-margin-left' style="">Amount:</b><label class='w3-text-red '><b><?php echo $row['Item_cost'];?> Frw</b></label></div>
      	<div class="w3-padding"><label><b class=' w3-left w3-margin-left' style="">E-mail:</b></label><label class='w3-text-red '><b><?php echo $row['E_mail'];?></b> </label></div>
        <div class="w3-padding"><label><b class=' w3-left w3-margin-left' style="">Telephone:</b></label><label class='w3-text-red '><b><?php echo $row['Telephone'];?></b></label></div>

           <!-- this are items that will  saved in the database -->
            <input type="hidden" name="item_id" value='<?php echo $row['Item_id'];?>' />
            <input type="hidden" name="item_type" value='<?php echo $row['Item_type'];?>' />
            <input type="hidden"  name="item_cost" value='<?php echo  $row['Item_cost'];?>' />
            <input type="hidden"  name="e_mail" value='<?php echo  $row['E_mail'];?>' />
            <input type="hidden"  name="telephone" value='<?php echo  $row['Telephone'];?>' />
            <input type="hidden" name="Buyer_E_mail" value="<?php echo $_SESSION['E_mail']?>" />
            <input type="hidden" name="Buyer_Telephone" value="<?php echo $_SESSION['Telephone']?>" />
            <input type="hidden" name="Buyer_id" value="<?php echo $_SESSION['Cust_id']?>" />
            <input type="hidden" name="item_photo" accept="image/*" value="<?php echo $row['Item_photo']?>" />

            <button class="w3-btn w3-margin-bottom w3-margin-right w3-margin-top w3-blue w3-round-xxlarge w3-hover-green" name="buy_item" style="text-decoration: none; "><i class="fa fa-dollar w3-xlarge w3-text-black"></i> Buy</button>
            <button class="w3-btn w3-margin-bottom w3-margin-right w3-margin-top  w3-blue w3-round-xxlarge w3-hover-green" name="add_cart" style="text-decoration: none; "><i class="fa fa-cart-arrow-down w3-xlarge w3-text-black"></i> Cart</button>

     </div>
        </form>
    
   <?php  }
    ?>
</div>

  <div class="w3-row w3-container w3-margin">
        <form method="POST">
            <div class="w3-row w3-container w3-margin">
                <input type="hidden" name="pageno" value="<?php echo $pageno; ?>">
                <input type="hidden" name="allcount" value="<?php echo $allcount; ?>">
                <fieldset title="pagination" class="">
                <button class="w3-btn w3-margin-top  w3-round-xxlarge w3-black w3-pointer" name="first" title="First page"><i class="fa fa-toggle-left w3-xxlarge"></i></button>
                <button class="w3-btn w3-margin-top  w3-round-xxlarge w3-black w3-pointer" name="prev" title="Previous page"><i class="fa fa-arrow-circle-o-left w3-xxlarge w3-text-white"></i></button>
                <button class="w3-btn w3-margin-top  w3-round-xxlarge w3-black w3-pointer" name="next" title="Next page"><i class="fa fa fa-arrow-circle-o-right w3-xxlarge w3-text-white"></i></button>
                <button class="w3-btn w3-margin-top w3-round-xxlarge  w3-black w3-pointer" name="last" title="Last page"><i class="fa fa-toggle-right w3-xxlarge"></i></button>
                </fieldset>

            </div>
            
        </form>

     <!--  <a class='w3-btn w3-margin w3-padding w3-black w3-middle' href="../index.php"><i class="fa fa-arrow-left w3-hover-text-orange w3-xlarge w3-margin-right" style="height:250x;" ></i>Back to home</a> -->
       </div>
        <?php } else {
        echo"<h1 class='w3-text-red'> <p>THE IS NO ITEMS OR PRODUCTS...</p> PLEASE COME IN NEXT TIME </h1>";
              # code...
            } 
  ?> 

<div class=" w3-modal w3-animate-zoom " id="carting_table" style="">
    <div class="w3-padding-large w3-margin w3-display-topmiddle w3-modal-content w3-col l6 m6 s12">
        <?php echo $notice;?>
        <span onclick="document.getElementById('carting_table').style.display='none'" class="w3-button w3-red   w3-display-topright">&times;</span>
                <h1>Item cart</h1>
                <?php

                $total_m=0;
                $output="";
                $tot_m=0;
                    // this is the header of the table
                $output.='
                    <table class="w3-table w3-table-all w3-stripped w3-hoverable w3-col l12 m12 s12" >
                        <tr>
                                <th>ITEM TYPE</th>
                                <th>ITEM COST</th>
                                <th>E-MAIL</th>
                                <th>TELEPHONE</th>
                                <th>ACTION</th></tr>';

                if(!empty($_SESSION['cart'])){// if carting is not empty then loop
                     foreach ($_SESSION['cart'] as $data => $value) {
                        $_SESSION["item_item"]=$value['item_id'];
                        $_SESSION["item_type"]=$value['item_type'];
                        $_SESSION["item_cost"]=$value["item_cost"];
                        $_SESSION["Owner_E_mail"]=$value["e_mail"];
                        $_SESSION["owner_telephone"]=$value["telephone"];

                        $_SESSION["Buyer_E_mail"]=$value["Buyer_E_mail"];
                        $_SESSION["Buyer_Telephone"]=$value["Buyer_Telephone"];
                        $_SESSION["Buyer_id"]=$value["Buyer_id"];
                        $_SESSION["Item_photo"]=$value["item_phot"];
                        $_SESSION["Buyer_name"]=$value["Buyer_name"];

                        $id_c=$_SESSION['Buyer_id'];
                        if (isset($_POST["buy"])) {// inserting carting data in the database
                         $query="INSERT INTO `purchased`( `Item_id`,`Item_type`, `Item_cost`, `Owner_Email`,`Owner_Telephone`, `Buyer_id`, `Buyer_names`, `Buyer_E_mail`, `Buyer_Telephone`, `payment_type`, `Buy_date`, `Item_photo`)
                                VALUES('".$_SESSION["item_item"]."','".$_SESSION["item_type"]."','".$_SESSION["item_cost"]."','".$_SESSION["Owner_E_mail"]."','".$_SESSION["owner_telephone"]."','".$_SESSION["Buyer_id"]."','".$_SESSION["Buyer_name"]."','".$_SESSION["Buyer_E_mail"]."','".$_SESSION["Buyer_Telephone"]."','MOBILE MONEY',Now(),'".$_SESSION["Item_photo"]."')";
                         
                         try {
                           $purchased=""; ///to be worked on tommorow
                           $row20="";
                           if($connection->exec($query))
                             {
                             $select=$connection->prepare("SELECT *FROM `purchased` WHERE Item_id='".$_SESSION["item_item"]."'");
                              $select->execute();
                              foreach($select->fetchAll() as $row20){
                                $purchased=$row20["Purchase_id"];
                                 
                                
                              }


                              $bill="INSERT INTO `billing_tb`(`Buyer_id`,`Purchase_id`,`Buyer_email`, `Buyer_names`, `Item_id`, `Item_type`, `Item_cost`,`Payment_type`, `Issued_date`) VALUES('".$_SESSION["Buyer_id"]."','$purchased','".$_SESSION["Buyer_E_mail"]."','".$_SESSION["Buyer_name"]."','".$_SESSION["item_item"]."','".$_SESSION["item_type"]."','MOBILE MONEY','".$_SESSION["item_cost"]."',Now())";
                              if ($connection->exec($bill)) {
                              echo "<script>alert('The item to be bought be ready to go on. then you will receive bill on whats app ,email, and phone sms after that be ready to get your item bought')</script>";
                              
                              } else {
                                echo "<script>alert('Excuse Dear No Try it again!!'+$item_cost)</script>";
                              }
      

                              $upd="UPDATE products SET Status='Bought' WHERE Item_id='".$_SESSION["item_item"]."'";
                              $connection->exec($upd);
                              
                             $count=0;
                             $notice="<p id='notice'><script>alert('Wait for online payment inorder to get youR item bought ')</script></p>";
                             echo $notice."<script>document.getElementById('carting_table').style.display='block';</script>";
                             
                           }
                             else{
                              unset($_SESSION["cart"]);
                             }

                             
                              
                         } catch (PDOException $th) {
                             echo"".$th->getMessage();
                         }
                        }
                        else{
                             // echo "<p class='w3-text-green'> not Inserted successfully!! </p>";
                        }
                            // this is the output of the items in the table carting. and this data is from $session_array
                        $output.="
                            <tr>
                               
                                <td>".$value['item_type']."</td>
                                <td>".$value["item_cost"]." Frw</td>
                                <td>".$value["e_mail"]."</td>
                                <td>".$value['telephone']."</td>
                                
                                <td>
                                    <a href='selling_form_cust.php?action=remove&item_id=".$value['item_id']."' class='w3-btn w3-red w3-pointer w3-margin'>Remove</a>
                                </td>
                            </tr>";

                        $total_m +=$value["item_cost"];

                        $count++;//count the number of items
                    }
                     $output.="
                            <tr >
                                <td colspan='2' class='w3-stripped'></td>
                                <td class='w3-light-blue'>Total money</td>
                                <td class='w3-light-blue w3-left'>".number_format($total_m,2)." Frw </td>
                                <td class='w3-light-blue'>
                                    <a href='selling_form_cust.php?action=clearAll' class='w3-btn w3-margin w3-red w3-pointer'>
                                         Clear All
                                    </a>
                                    <form method='POST'>
                                    <button name='buy' class='w3-btn w3-margin w3-green'> Buy</button>
                                    </form>
                                </td>
                            </tr>
                     ";

                }
                 echo $output;
                  if (isset($_POST["buy"])) {
                            
                          
                          ?>

                           <form>
                            <script src="https://checkout.flutterwave.com/v3.js"></script>
                            <!-- <button type="button" onClick="makePayment()">Pay Now</button> -->
                          </form>

                          <script>
                            // function makePayment() {
                              FlutterwaveCheckout({
                                public_key: "FLWPUBK-a524003832fa24ac16fdb083141546bd-X",
                                tx_ref: "nyj_"+Math.floor((Math.random()*100000000)+1),
                                amount: <?php echo $total_m;?>,
                                currency: "RWF",
                                country: "RW",
                                payment_options: "card,mobilemoney,ussd",
                                customer: {
                                  email: "<?php echo $_SESSION["Buyer_E_mail"];?>",
                                  phone_number: "<?php echo $_SESSION["Buyer_Telephone"];?>",
                                  name: "<?php echo $_SESSION["Buyer_name"];?>",
                                },
                                callback: function (data) { // specified callback function
                                  console.log(data);
                                },
                                customizations: {
                                  title: "My store",
                                  description: "Payment for items in cart",
                                  logo: "https://assets.piedpiper.com/logo.png",
                                },
                              });
                              // window.location.reload(false);
                            // }
                          </script>

                          <?php
                          //this is the amount of items summed to each other
                      }
                ?>
                
            </div>
            <p id="resp"><p>
           <script type="text/javascript">
            let ans=document.getElementById('notice').value;
            document.getElementById('resp').innerHTML=ans;

         </script>
  </div>
   
    <?php 
       
    if(isset($_GET["action"])){

        if($_GET["action"]=="clearAll"){
            $count=0;
            unset($_SESSION["cart"]);

        }
        if($_GET["action"]=="remove"){

            foreach ($_SESSION["cart"] as $data => $remove) {
                
                if($remove["item_id"]==$_GET["item_id"]){
                    $count--;
                    unset($_SESSION["cart"][$data]);

                }
            }

        }
      }
     echo '<script>
                    
                    let count=document.getElementById("count").innerHTML='.$count.';
                    console.log(count);
                       </script>';

     echo '<script>
                    
                    let buy=document.getElementById("buy").innerHTML=document.getElementById("form_buy").form;
                    console.log(count);
                       </script>';


 ?>
 
</div>
</div>
</body>
</html>

