<?php include"../config/connection.php";
include '../controller/logout.php';
$row="";
$notice="";

if(isset($_GET["delete"])){
	$message_id=$_GET["message_id"];

	$delete="DELETE FROM message WHERE Message_id='$message_id'";
	$result=$connection->exec($delete);
	if ($result) {
		echo "<script>alert('Message Deleted successfully!!!')</script>";
	} 
	

}
elseif(isset($_GET["read"])){
	$message_id=$_GET["message_id"];

	$updt="UPDATE message SET readState='Read' WHERE Message_id='$message_id'";
	$result=$connection->exec($updt);
	if ($result) {
		echo "<script>alert('Message read successfully!!!')</script>";
	}
	else{
		echo "<script>alert('It is already read successfully!!!')</script>";

	} 
	

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>All Items</title>
	<link rel="stylesheet" href="../style/w3.css">
	
    <!-- <link rel="stylesheet" href="../style/font-awesome.min.css"> -->
    <link rel="stylesheet" href="../style/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body style="background:#e6e6e6;color:black;">

<?php include 'side_bar.php';?>
<?php include 'header.php';?>
<div class="w3-container  w3-padding w3-padding-16 w3-center" style="margin-top: 70px;">
	<div class="w3-container w3-w3-margin w3-padding-large">
		
			<form action="" method="POST" class="">
				<div class="w3-container  w3-col l12 m12 s12 w3-margin">
				<div class=" w3-col l3 m3 s8 w3-margin-right ">
					<input oninput="w3.filterHTML('#table', '.item', this.value)" class="w3-input w3-border-red w3-border w3-round-xxlarge" placeholder="Enter Word or anything want to see">
				</div>
				<button class="w3-btn w3-black  w3-round-xxlarge w3-hover-white" onclick="PrintPage('print_sel')"><i class="fa fa-print w3-xlarge w3-hover-text-red"></i> Print</button>
			</div>
			
			</form>
		
	</div>
    <div class="w3-content w3-col s12 m9 l9 w3-light-grey " style="margin-left: 21%;" >
	
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

            }?>
		<form action="" method="POST" class="">
			<div class="" id="print_sel">

				<?php echo $notice;?>
				<div class="w3-container w3-col l12 m9 s12 w3-white " ><h1><strong>ALL MESSAGES </strong></h1></div>
				<table class="w3-table-all w3-padding-large  w3-responsive" id="table" style="border:none;">
					<tr class="w3-red ">
						<th class="w3-red">N<label style="text-decoration: underline;">&#111;</label></th>
						<th>E-MAIL</th>
						<th>SUBJECT</th>
						<th>CONTENT</th>
						<th>STATUS</th>
						<th>ACTION</th>

					</tr>
								<?php
										// $buyer=$_SESSION["User_id"];
										$sql = "SELECT COUNT(*) FROM message";
							            $result = $connection->query($sql);
							            $fetchresult = $result->fetchColumn();
							            $allcount = $fetchresult;

										$SEARCH=$connection->prepare("SELECT * FROM message limit $pageno,$rowperpage");
										$SEARCH->execute();
										
										 foreach ($SEARCH->fetchAll() as $row) {?>
										 			
										 			 <tr class='item'>
										 			 <td class='w3-red'><?php echo $row["Message_id"];?></td>
										 			 <td class=''><?php echo $row["Email"];?></td>
										 			 <td class=''><?php echo $row["Subject"];?></td>
										 			 <td class=''><?php echo $row["content"];?></td>
										 			 <td class=''><?php echo $row["readState"];?></td>
													 <td>
													 	<?php echo "<a title='Click to read this message. ' href='message.php?message_id=".$row['Message_id']."&read' class='w3-btn w3-round-xxlarge w3-red w3-pointer'><i class='fa fa-check'></i></a>

													 		<a title='Click to  Delete this message. ' href='message.php?message_id=".$row['Message_id']."&delete' class='w3-btn w3-round-xxlarge w3-red w3-pointer'><i class='fa fa-remove'></i></a>
													 	  "; ?>
													 </td> </tr>


								            <?php  }
						?>
					
				</table>
			</div>


		</form>
		
	</div>

	<div class="w3-content" id="edt">

		 <div class="w3-row w3-container w3-margin">
        <form method="POST" class="w3-container">
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
       </div>
		
	</div>
	
</div>
</body>
</html>
<script src="../Js/w3.js"></script>
<script type="text/javascript">

function PrintPage(el){
let els=document.getElementById(el).innerHTML;
let remain=document.body.innerHTML;
document.body.innerHTML=els;
window.print();
document.body.innerHTML=remain;
}

</script>