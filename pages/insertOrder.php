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
	$total_quantity = $mysqli->query("SELECT QUANTITY FROM PRODUCT WHERE PRODUCT_ID = " . $prodID);
	$total_quantity = mysqli_fetch_assoc($total_quantity);
	
	$price_lookup = "SELECT cost FROM PRODUCT WHERE PRODUCT_ID = " . $prodID;
	if($price  = $mysqli->query($price_lookup)){
		$price = mysqli_fetch_array($price,MYSQLI_ASSOC);
		$cost  = number_format($price['cost'], 2);
		$total_price = number_format(($cost * $quantity), 2);
		$new_quantity = number_format($total_quantity['QUANTITY'],0) - number_format($quantity,0);
		if(!($new_quantity < 0)){
			$insert = "INSERT INTO `order` (`product_id`, `cust_idno`, `quantity`, `price_each`, `total_paid`, `order_num`) VALUES ('" . $prodID . "', '" . $custID."', '" . $quantity . "', '" . $cost . "', '" . $total_price . "', NULL);";
			$update = "UPDATE PRODUCT SET QUANTITY = " . $new_quantity . " WHERE product_id = " . $prodID;
			if($result = $mysqli->query($insert) && $result2 = $mysqli->query($update))
				$fieldReport = "Your order has been submitted!";
			else
				$fieldReport = "Error in submitting";
		}else
			$fieldReport = "Not enough inventory for sale";
	}else
		$fieldReport = "Unable to find price for product id " . $prodID;
	//header("refresh:10; url=/pages/newOrder.php");
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
        	<h3><?php echo "Amount paid: $" . $total_price?></h3>
        	<h1></h1>
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