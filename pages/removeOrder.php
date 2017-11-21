<!-- 
	Christopher Raymond & Laramie DeBaun	
	Databases 2017 fall
	Order Deletion Confirmation Page
 -->
<?php include_once ($_SERVER['DOCUMENT_ROOT'].'/pages/header.php'); ?>
<title>Food Service Vendor Refund</title>

<?php
	if ($mysqli->connect_errno) {
		echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		exit ();
	}

	$order = $_POST['order'];

	$select = "SELECT TOTAL_PAID FROM `ORDER` WHERE ORDER_NUM = " . $order;
	$delete = "DELETE FROM `ORDER` WHERE ORDER_NUM = " . $order;
	if($result = $mysqli->query($select)){
		if($result2 = $mysqli->query($delete)){
			$result = mysqli_fetch_array($result, MYSQLI_ASSOC);
			$fieldReport = "$" . $result['TOTAL_PAID'] . " has been refunded!";
		}else
			$fieldReport = "Order not found";
	}else
		$fieldReport = "Error in price";
	header("refresh:10; url=/pages/orders.php");

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