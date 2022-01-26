<?php
// session_start();

?>
<div class="w3-row  servicess w3-padding " id="product" style="">
  <div class="w3-black w3-round-xxlarge w3-opacity"><strong><h1 class="w3-center">ALL PRODUCTS</h1></strong></div>



  <?php

            $rowperpage = 4;// number of Items per page
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
            foreach($sql1->fetchAll() as $row){
                $_SESSION["img"]=$row["Item_photo"];

            ?>


        <div class="w3-container w3-round-xlarge w3-col l3 m3 s12 w3-black">
            <div class="w3-padding">
                <div class="w3-pink w3-padding w3-round-xlarge ">
                    <h3><?php echo $row["Item_type"];?></h3>
                </div>
                <img src='<?php echo"".$row["Item_photo"];?>' alt="demo picture" class="w3-padding" style="border-radius: 20px 20px; width: 100%;height: 300px;">
                <div class="w3-container w3-pink w3-round-xlarge">            
                    <p><label class="w3-margin-right">Price: </label>    <?php echo $row["Item_cost"];?> Frw</p>

                </div>
            </div>
        </div>
      <?php }?>
      
        <form method="POST">
            <div class="w3-row w3-container w3-margin w3-right">
                <input type="hidden" name="pageno" value="<?php echo $pageno; ?>">
                <input type="hidden" name="allcount" value="<?php echo $allcount; ?>">
                <fieldset title="pagination" class="">
                    <legend><strong>Nexting image</strong></legend>
                <!-- <button class="w3-btn w3-margin-top  w3-round-xxlarge w3-black w3-pointer" name="first" title="First page"><i class="fa fa-toggle-left w3-xxlarge"></i></button> -->
                <button class="w3-btn w3-margin-top  w3-round-xxlarge w3-black w3-pointer" name="prev" title="Previous page"><i class="fa fa-arrow-circle-o-left w3-xxlarge w3-text-white"></i></button>
                <button class="w3-btn w3-margin-top  w3-round-xxlarge w3-black w3-pointer" name="next" title="Next page"><i class="fa fa fa-arrow-circle-o-right w3-xxlarge w3-text-white"></i></button>
                <!-- <button class="w3-btn w3-margin-top w3-round-xxlarge  w3-black w3-pointer" name="last" title="Last page"><i class="fa fa-toggle-right w3-xxlarge"></i></button> -->
                <button class="w3-btn w3-margin-top w3-round-xxlarge  w3-black w3-pointer" name="all" title="all product"> see all products</button>
                </fieldset>

            </div>
            
        </form>
    </div>
