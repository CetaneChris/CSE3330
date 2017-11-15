<?php include_once ($_SERVER['DOCUMENT_ROOT'].'/pages/header.php'); ?>
<title>Food Service Vendor New Product</title>

<?php
	if ($mysqli->connect_errno) {
		echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		exit ();
	}

	$description = $staff->getOperator();
	
	$sl_id = $_POST['service_level'];
	$srnotes = $_POST['notes'];
	$srtime = date("Y-m-d h:i:s");
	
	switch($_POST['service_level']){
		case 100:				//case for completed ticket
			$solvedSt = "Y";
		break;
		default:
			$solvedSt = "N";
		break;
	}
	
	if($_POST['dev'] == 0){
			echo "Invalid Machine Choice";
			header("refresh:5; url=/service/individualHistory.php?service_call_id=$sc_id");
	}else 
		$devID = $_POST['dev'];
	
	$sl_id = $_POST['service_level'];
	$srnotes = $_POST['notes'];
	$srtime = date("Y-m-d h:i:s");

	if($_POST['service_level'] == 100){
		//case for completed ticket
		$solvedSt = "Y";
		$srnotes .= "\nTicket marked as completed.";
	}else
		$solvedSt = "N";
	
	$insert = "INSERT INTO `reply` (`sc_id`, `staff_id`, `sr_notes`, `sr_time`) VALUES ('".$sc_id."', '".$staffID."', '".$srnotes."', '".$srtime."');";
	$update = "UPDATE `service_call` SET `d_id`=".$devID.",`sl_id`=".$sl_id.",`solved`='".$solvedSt."' WHERE `sc_id` = ".$sc_id;
	if($result = $mysqli->query($insert)){
		if($result = $mysqli->query($update))
			$fieldReport = "Your update has been submitted, thank you!";
		else
			$fieldReport = "Error in updating";
	}
	else
		$fieldReport = "Error in submitting";
	header("refresh:5; url=/service/individualHistory.php?service_call_id=$sc_id");

?>


<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo $fieldReport; ?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
        	<p>This page will be redirected in 10 seconds</p>
        </div>
        <!-- /.col-lg-4 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->
<?php
//Standard call for dependencies
include_once ($_SERVER['DOCUMENT_ROOT'].'/pages/footer.php');
?>