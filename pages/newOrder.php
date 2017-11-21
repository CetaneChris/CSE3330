<!-- 
	Christopher Raymond & Laramie DeBaun	
	Databases 2017 fall
	New Order Page
 -->
<?php include_once ($_SERVER ['DOCUMENT_ROOT'] . '/pages/header.php'); ?>
<script src="jquery.js"> </script>
<title>Food Service Vendor New Order</title>

<body>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">New Order</h1>
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
                    <form name="neworder" method= "POST"  action="/pages/insertOrder.php" onsubmit="return validateForm();">
                        <table class="table table-striped">
                            <tr>
                                <td>Product ID</td>
                                <td>
                                	<div class="form-group">
										<select class="form-control" id="prod" name="prod">
										<?php
											$product_list = "SELECT product_id FROM PRODUCT ORDER BY PRODUCT_ID ASC";
											echo "<option value=\"\" > Select Product</option>";
											
											if ($products = $mysqli->query ($product_list)) {
												while ( $product = mysqli_fetch_array ( $products ) ) {
													echo "<option value=" . $product['product_id'] . ">" . $product['product_id'] . "</option>";
												}
											}
											else
												die("There was an error loading device_group ");
										?>
										</select>
									</div>
                                </td>
                            </tr>
                            <tr>
                                <td>Customer ID</td>
                                <td>
                                    <div class="form-group">
                                        <select class="form-control" id="cust" name="cust">
										<?php
											$customer_list = "SELECT idnumber FROM customer ORDER BY IDNUMBER ASC";
											echo "<option value=\"\" > Select Customer</option>";
											
											if ($customers = $mysqli->query ($customer_list)) {
												while ($customer = mysqli_fetch_array($customers) ) {
													echo "<option value=" . $customer['idnumber'] . ">" . $customer['idnumber'] . "</option>";
												}
											}
											else
												die("There was an error loading device_group ");
										?>
										</select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Quantity</td>
                                <td>
                                	<div class="form-group">
										<input type="number" class="form-control" id="quantity" name="quantity"  min="1" step="1">
									</div>
                                </td>
                            </tr>
                            <tr>
                                <td>Current Date</td>
                                <td><?php echo $date = date("m/d/Y", time());?></td>
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
        <div class="col-lg-5">
            <div class="panel panel-default">
				<div class="panel-heading">
					<i class="fa fa-shopping-cart fa-fw"></i> Products
				</div>
				<div class="panel-body">
                    <table id="products" class="table table-striped table-bordered"><?php
							$query = "SELECT description, cost, product_id FROM PRODUCT ORDER BY product_id ASC";
        
							$result = $mysqli->query($query);
				
				        	//display column headers
				            echo "<thead>";
					        	echo "<th style='text-align:center' width=\"" . 100/mysqli_num_fields($result) . "%\">Description</th>";
					        	echo "<th style='text-align:center' width=\"" . 100/mysqli_num_fields($result) . "%\">Price Each</th>";
				            	echo "<th style='text-align:center' width=\"" . 100/mysqli_num_fields($result) . "%\">Product ID</th>";
				            echo "</thead>";

				            //display the data
				            echo "<tbody>";
				            	while($row = mysqli_fetch_array($result)){
				                  	echo "<tr>";

				                  	//Description
				                  	echo "<td align='center'>" . $row['description'] . "</td>";

				                  	//Price
				                  	echo "<td align='center'>" . $row['cost'] . "</td>";

				                  	//Product ID
				                  	echo "<td align='center'>" . $row['product_id'] . "</td>";

				                  	echo "</tr>";
				                  }
			                  ?>   
			            </tbody>
					</table>
                </div>
			</div>
		</div>
        <div class="col-lg-5">
            <div class="panel panel-default">
				<div class="panel-heading">
					<i class="fa fa-shopping-cart fa-fw"></i> Customers
				</div>
				<div class="panel-body">
                    <table id="customers" class="table table-striped table-bordered"><?php
							$query = "SELECT name, idnumber FROM CUSTOMER ORDER BY IDNUMBER";
        
							$result = $mysqli->query($query);
				
				        	//display column headers
				            echo "<thead>";
					        	echo "<th style='text-align:center' width=\"" . 2*(100/(mysqli_num_fields($result)+2)) . "%\">Name</th>";
	            				echo "<th style='text-align:center' width=\"" . 100/(mysqli_num_fields($result)+2) . "%\">Customer ID</th></tr>";
				            echo "</thead>";

				            //display the data
				            echo "<tbody>";
				            	while($row = mysqli_fetch_array($result)){
				                  	echo "<tr>";

				                  	//Name
				                  	echo "<td align='center'>" . $row['name'] . "</td>";

	        			          	//Phone Number
            			      		echo "<td align='center'>" . $row['idnumber'] . "</td>";

            			      		echo "</tr>";
				                  }
			                  ?>   
			            </tbody>
					</table>
                </div>
			</div>
		</div>
    </div>
    <!-- /.row -->
    <!-- /#page-wrapper -->
</body>
<script type="text/javascript">
	function validateForm(){
    	var prod  = document.getElementById("prod").value;
    	var cust  = document.getElementById("cust").value;
    	var quant = document.getElementById("quantity").value;

    	if(prod == "" || cust == "" || quant == ""){
    		document.getElementById('errordiv').style.display = 'block';
    
    		document.getElementById("errormessage").innerHTML = "All fields are required";
    		
    		return false;
    	}
    }
</script>
<script type="text/javascript" charset="utf-8">
	window.onload = function() {
	   	$('#customers').DataTable();
	   	$('#products').DataTable();
    };
</script>
<!-- The following script gets the response for device dropdown using dg_id from the group selection -->
<?php
    // Standard call for dependencies
    include_once ($_SERVER ['DOCUMENT_ROOT'] . '/pages/footer.php');
    ?>