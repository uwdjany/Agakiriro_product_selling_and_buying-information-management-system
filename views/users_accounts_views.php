<?php include"../config/connection.php";
include '../controller/logout.php';
$row="";
$notice="";
$user_id="";
if(isset($_GET["delete"])){
	$user_id=$_GET["User_id"];

	$delete="DELETE FROM users_account WHERE User_id='$user_id'";
try {
		$result=$connection->exec($delete);
	if ($result) {
		echo "<script>alert('User Deleted successfully!!!')</script>";
	} 
 else {
		// echo "<script>alert('Not Deleted successfully!!!')</script>";
	
}}
 catch (Exception $e) {
		echo "<script>alert('It is interLinked please!!!')</script>";
		
	}}

?>

<!DOCTYPE html>
<html>
<head>
	<title>All Staffs</title>
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
    <div class="w3-container w3-border w3-border-red s12 m8 l8 w3-light-grey " style="" >
	
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
		<form action="" method="POST">
			<div class="w3-container " id="print_sel">

				<?php echo $notice;?>
				<div class="w3-container w3-white" ><h1><strong>ALL STAFFS </strong></h1></div>
				<table class="w3-table-all w3-left w3-responsive" id="table">
					<tr class="w3-red ">
						<th class="w3-red">N<label style="text-decoration: underline;">&#111;</label></th>
						<th>FIRST NAME</th>
						<th>LAST NAME</th>
						<th>GENDER</th>
						<th>COUNTRY</th>
						<th>NATIONAL ID</th>
						<th>E-MAIL</th>
						<th>TELEPHONE</th>
						<th>BIRTH DATE</th>
						<th>USER TYPE</th>
						<th>ADDRESS</th>
						<th>PHOTO</th>
						<th>REGISTERED DATE</th>
						<th>ACTION</th>

					</tr>
								<?php
										// $buyer=$_SESSION["User_id"];
										$sql = "SELECT COUNT(*) FROM Users_account";
							            $result = $connection->query($sql);
							            $fetchresult = $result->fetchColumn();
							            $allcount = $fetchresult;

										$SEARCH=$connection->prepare("SELECT * FROM Users_account limit $pageno,$rowperpage");
										$SEARCH->execute();
										
										 foreach ($SEARCH->fetchAll() as $row) {?>
										 			
										 			 <tr class='item'>
										 			 <td class='w3-red'><?php echo $row["User_id"];?></td>
										 			 <td class=''><?php echo $row["First_name"];?></td>
										 			 <td class=''><?php echo $row["Last_name"];?></td>
										 			 <td class=''><?php echo $row["Gender"];?></td>
										 			 <td class=''><?php echo $row["Country"];?></td>
										 			 <td class=''><?php echo $row["National_id"];?></td>
										 			 <td class=''><?php echo $row["E_mail"];?></td>
										 			 <td class=''><?php echo $row["Telephone"];?></td>
										 			 <td class=''><?php echo $row["Birth_date"];?></td>
										 			 <td class=''><?php echo $row["User_type"];?></td>
										 			 <td class=''><?php echo $row["Address"];?></td>
										 			 <td class=''><img style='width:30px;' class='w3-round-xxlarge' src="<?php echo $row["Photo"];?>"></td>
										 			 <td class=''><?php echo $row["Registered_date"];?></td>
													 <td>
													 	<?php echo "<a title='Click to Delete this User. ' href='users_accounts_views.php?User_id=".$row['User_id']."&delete' class='w3-btn w3-round-xxlarge w3-red w3-pointer'><i class='fa fa-remove'></i></a>"; ?>
													 </td>
										 			 

										 			 
										 			 
								                </tr>


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