<?php include_once ($_SERVER['DOCUMENT_ROOT'].'/pages/header.php'); ?>
<title>Food Service Vendor New Order</title>

<?php
	if ($mysqli->connect_errno) {
		echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		exit ();
	}

	$prodID = $_POST['prod'];	
	$custID = $_POST['cust'];
	$quantity = $_POST['quantity'];
	
	$price_lookup = "SELECT cost FROM PRODUCT WHERE PRODUCT_ID = " . $prodID;
	if($price  = $mysqli->query($price_lookup)){
		$price = mysqli_fetch_array($price,MYSQLI_ASSOC);
		$cost  = number_format($price['cost'], 2);
		$total = number_format(($cost * $quantity), 2);
		$insert = "INSERT INTO `order` (`product_id`, `cust_idno`, `quantity`, `price_each`, `total_paid`, `order_num`) VALUES ('" . $prodID . "', '" . $custID."', '" . $quantity . "', '" . $cost . "', '" . $total . "', NULL);";
		if($result = $mysqli->query($insert))
			$fieldReport = "Your order has been submitted!";
		else
			$fieldReport = "Error in submitting";
	}else
		$fieldReport = "Unable to find price for product id " . $prodID;
	header("refresh:10; url=/pages/newOrder.php");

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