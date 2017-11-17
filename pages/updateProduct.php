<?php include_once ($_SERVER ['DOCUMENT_ROOT'] . '/pages/header.php'); ?>
<script src="jquery.js"> </script>
<title>Food Service Vendor New Product</title>

<body>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Update Entry</h1>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-10">
                <div class="alert alert-danger" role = "alert" id="errordiv" style="display:none;">
                    <p id="errormessage"></p>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-shopping-cart fa-fw"></i> All fields are required
                    </div>
                    <div class="panel-body">
                    <form name="updateproduct" method="POST" enctype="multipart/form-data" action="/pages/updateRecords.php" onsubmit="return validateForm();">
                        <table class="table table-striped">
                            <tr>
                                <td>Product ID</td>
                                <td>
                                	<div class="form-group">
										<?php echo "<input type='text' name='productid' value=" . $_GET['product_id'] . " readonly>"?>
									</div>
                                </td>
                            </tr>
                            <tr>
                                <td>Product Name</td>
                                <td>
                                	<div class="form-group">
									<?php
										$default_value = "SELECT description FROM product WHERE product_id = ". $_GET['product_id'];
	                                	if ($default = $mysqli->query($default_value)){
	                                		$default = mysqli_fetch_array($default);
	                                		echo "<input type='text' name='description' value=\"" . $default['description'] . "\">";
										}
	                                	else
	                                		echo "There was an error loading the product details";
									?>
									</div>
                                </td>
                            </tr>
                            <tr>
                                <td>Type</td>
                                <td>
                                <?php
			                    	echo "<select class=\"form-control\" name=\"prodType\" id=\"prodType\">";
			                    	$default_value = "SELECT type FROM product WHERE product_id = ". $_GET['product_id'];
									if ($default = $mysqli->query($default_value)){
										$default = mysqli_fetch_array($default);
										echo "<option selected value=\"" . $default['type'] . "\">" . $default['type'] . "</option>";
										echo "<option value=\"APPETIZER\">APPETIZER</option>";
										echo "<option value=\"SALAD\">SALAD</option>";
										echo "<option value=\"BEVERAGE\">BEVERAGE</option>";
										echo "<option value=\"MAINDISH\">MAINDISH</option>";
										echo "<option value=\"DESSERT\">DESSERT</option>";
									}
									else
										echo "There was an error loading the product details";						
									?>
                                </td>
                            </tr>
                            <tr>
                                <td>Quantity</td>
                                <td>
                                	<div class="form-group">
                                	<?php
	                                	$default_value = "SELECT quantity FROM product AS type WHERE product_id = ". $_GET['product_id'];
	                                	if ($default = $mysqli->query($default_value)){
	                                		$default = mysqli_fetch_array($default);
	                                		echo "<input type=\"number\" class=\"form-control\" id=\"quantity\" name=\"quantity\" min=\"0\" step=\"1\" value=\"" . $default['quantity'] . "\">";
										}
	                                	else
	                                		echo "There was an error loading the product details";
									?>
									</div>
                                </td>
                            </tr>
                            <tr>
                                <td>Cost</td>
                                <td>
                                	<div class="form-group">
										<?php
	                                	$default_value = "SELECT cost FROM product AS type WHERE product_id = ". $_GET['product_id'];
	                                	if ($default = $mysqli->query($default_value)){
	                                		$default = mysqli_fetch_array($default);
	                                		echo "<input type=\"number\" class=\"form-control\" id=\"cost\" name=\"cost\" min=\"0\" step=\"0.01\" value=\"" . $default['cost'] . "\">";
										}
	                                	else
	                                		echo "There was an error loading the product details";
										?>
									</div>
                                </td>
                            </tr>
                            <tr>
                                <td><input class="btn btn-primary pull-right" type="reset" value="Reset"></td>
                                <td><input class="btn btn-primary" type="submit" value="Submit"></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.col-lg-8 -->
    </div>
    <!-- /.row -->
    <!-- /#page-wrapper -->
</body>

<script type="text/javascript">
    function validateForm(){
    	var name = document.getElementById("description").value;
    	var type = document.getElementById("prodType").value;
		var quantity = document.getElementById("quantity").value;
    	var cost = document.getElementById("cost").value;
    	var Fname = document.getElementById("fileName").value;
    
    	if(name == "" || type == "" || quantity == "" || cost == "" || Fname == ""){
    		document.getElementById('errordiv').style.display = 'block';
    
    		document.getElementById("errormessage").innerHTML = "All fields are required";
    		
    		return false;
    	}
    }
</script>
<!-- The following script gets the response for device dropdown using dg_id from the group selection -->
<?php
    // Standard call for dependencies
    include_once ($_SERVER ['DOCUMENT_ROOT'] . '/pages/footer.php');
    ?>