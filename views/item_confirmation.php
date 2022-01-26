<?php
include"../controller/logout.php";
include "../config/connection.php";
$notice="";
 if(isset($_GET["confirmed"])){
            $item=$_GET["ITEM_ID"];
           $cancel="UPDATE `products` SET `Status`='Confirmed' WHERE `Item_id`='$item' AND `Status`='Appending'";
           
           if ($connection->exec($cancel)) {
                 $notice="<script>alert('you have confirmed item number  '+$item)</script>";
             
            } 
           //  elseif(!$connection->exec($cancel)) {
           //      echo "<script>alert('Not updated')</script>"; 
           // }
        }
        elseif(isset($_GET["cancel"])){
          $item=$_GET["ITEM_ID"];
           $cancel="UPDATE `products` SET `Status`='Rejected' WHERE `Item_id`='$item' AND `Status`='Appending'";
           
           if ($connection->exec($cancel)) {
                 $notice="<script>alert('you have Rejected item number  '+$item)</script>";
            } 
           //  elseif(!$connection->exec($cancel)) {
           //      echo "<script>alert('Not updated')</script>"; 
           // }
            }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy items</title>
      <link rel="stylesheet" href="../style/w3.css">
      <link rel="stylesheet" href="../style/font-awesome.min.css">
      <link rel="stylesheet" href="../style/font-awesome/4.7.0/css/font-awesome.min.css">
     
</head>
<body style="background:#e6e6e6;color:black;">

<?php include 'side_bar.php';?>
<?php include 'header.php';?>
<!-- this is the table that is showing items -->
<div class="w3-container w3-padding-16" style="margin-top: 70px;">
<?php echo $notice;?> 
 <div class="" >
  
 <div class="">
<?php
            $rowperpage = 6;// number of Items per page
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

$sql = "SELECT COUNT(*) FROM products WHERE Status='Appending'";
            $result = $connection->query($sql);
            $fetchresult = $result->fetchColumn();
            $allcount = $fetchresult;
            // selecting rows
            $sql1 = $connection->prepare("SELECT * FROM products WHERE Status='Appending' limit $pageno,$rowperpage");
            $sql1->execute();
            $slct=$sql1->fetchAll();
            $sno = $pageno+ 1;
            if ($slct) {
              foreach($slct as $row){
                $_SESSION["it_id"]=$row["Item_id"];
                $_SESSION["img"]=$row["Item_photo"];
?>

<form action="" method="post" class="w3-round-xxlarge w3-col s12 l3 m3"
 enctype="multipart/form-data" style="">
	
    <div class='w3-card-4 w3-light-grey w3-round-xxlarge w3-margin' style=''>
        <div class=""><img class='w3-round-xxlarge w3-col l12 m12 s12 w3-padding' src='<?php echo $row["Item_photo"];?>' style="width: 100%; height: 250px;"></div>

        <div class="w3-padding"><label><b class=' w3-left w3-margin-left' style="">Name:</b></label><label class='w3-text-red '><b><?php echo $row['Item_type'];?></b></label></div>
        <div class="w3-padding"><b class=' w3-left w3-margin-left' style="">Amount:</b><label class='w3-text-red '><b><?php echo $row['Item_cost'];?> Frw</b></label></div>
        <div class="w3-padding"><label><b class=' w3-left w3-margin-left' style="">E-mail:</b></label><label class='w3-text-red '><b><?php echo $row['E_mail'];?></b> </label></div>
        <div class="w3-padding"><label><b class=' w3-left w3-margin-left' style="">Telephone:</b></label><label class='w3-text-red '><b><?php echo $row['Telephone'];?></b></label></div>
           <!-- this are items that will  saved in the database -->
            <input type="hidden" name="item_id" value='<?php echo $row['Item_id'];?>' />
            <a href='item_confirmation.php?ITEM_ID=<?php echo $row['Item_id']?>&confirmed' class='w3-btn w3-round-xxlarge w3-red w3-pointer w3-margin'>Confirmation</a>
            <a href='item_confirmation.php?ITEM_ID=<?php echo $row['Item_id']?>&cancel' class='w3-btn w3-round-xxlarge w3-red w3-pointer w3-margin'>Cancel</a>

     </div>

        </form>

 
 <?php }?>
  <div class="w3-container w3-margin" style="">
        <form method="POST" class="">
            <div class="w3-row w3-margin">
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
       </div> <?php } else {
        echo"<h1 class='w3-text-red'> <p>THE IS NO APPENDED PRODUCT...</p> PLEASE COME IN NEXT TIME </h1>";
              # code...
            } 
  ?>

   
 </div>
</div>
</div>
</body>
</html>

