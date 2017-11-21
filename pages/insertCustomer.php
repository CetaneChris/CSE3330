/*
	Christopher Raymond & Laramie DeBaun	
	Databases 2017 fall
	Customer Insertion & redirect Page
*/
<?php include_once ($_SERVER['DOCUMENT_ROOT'].'/pages/header.php'); ?>
<title>Food Service Vendor New Customer</title>

<?php
	if ($mysqli->connect_errno) {
		echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		exit ();
	}

	$name = $_POST['name'];	
	$phoneno = $_POST['pno'];
	$address = $_POST['address'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$createdate = date("Y-m-d");

	$insert = "INSERT INTO `customer` (`name`, `phoneno`, `address`, `email`, `username`, `password`, `createddate`, `idnumber`) VALUES ('" . $name . "', '" . $phoneno."', '" . $address . "', '" . $email . "', '" . $username . "', '" . $password . "', '" . $createdate . "', NULL);";
	if($result = $mysqli->query($insert))
		$fieldReport = "Your customer has been submitted!";
	else
		$fieldReport = "Error in submitting";
	header("refresh:10; url=/pages/newCustomer.php");

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