/*
	Christopher Raymond & Laramie DeBaun	
	Databases 2017 fall
	Customer Removal Confirmation Page
*/
<?php include_once ($_SERVER['DOCUMENT_ROOT'].'/pages/header.php'); ?>
<title>Food Service Vendor New Customer</title>

<?php
	if ($mysqli->connect_errno) {
		echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		exit ();
	}

	$cust = $_POST['cust'];	

	$insert = "DELETE FROM `customer` WHERE IDNUMBER = " . $cust . ";";
	if($result = $mysqli->query($insert))
		$fieldReport = "This customer has been removed!";
	else
		$fieldReport = "Error in submitting";
	header("refresh:10; url=/pages/customer.php");

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