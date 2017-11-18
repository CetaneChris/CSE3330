<?php include_once ($_SERVER['DOCUMENT_ROOT'].'/pages/header.php'); ?>
<title>Food Service Vendor Update Product</title>

<?php
	if ($mysqli->connect_errno) {
		echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		exit ();
	}

	$prodID = $_POST['productid'];
	$description = $_POST['description'];	
	$type = $_POST['prodType'];
	$quantity = $_POST['quantity'];
	$cost = number_format($_POST['cost'], 2);
	
	if($_FILES['fileName']['size'] > 0){ //HERE
		$product_image_old = "SELECT product_image FROM product WHERE product_id = " . $prodID;
		if($result = $mysqli->query($product_image_old)){
			$result = mysqli_fetch_array($result,MYSQLI_ASSOC);
			$target_dir = "../images/";
			$old_path = $target_dir . $result['product_image'];
			unlink($old_path);
			$target_file = $target_dir . basename($_FILES["fileName"]["name"]);
			move_uploaded_file($_FILES['fileName']['tmp_name'],$target_file);
			$update = "UPDATE PRODUCT SET DESCRIPTION = \"" . $description . "\", TYPE = \"" . $type . "\", QUANTITY = " . $quantity . ", COST = " . $cost . ", PRODUCT_IMAGE = \"" . $_FILES['fileName']['name'] . "\" WHERE PRODUCT_ID = " . $prodID;
		}
		else
			echo "<p>Unable to delete old image</p>";
	}else
		$update = "UPDATE PRODUCT SET DESCRIPTION = \"" . $description . "\", TYPE = \"" . $type . "\", QUANTITY = " . $quantity . ", COST = " . $cost . " WHERE PRODUCT_ID = " . $prodID;
	if($mysqli->query($update))
		$fieldReport = "Your change has been made!";
	else
		$fieldReport = "Error in submitting";
	header("refresh:10; url=/pages/products.php");

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