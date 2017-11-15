<?php include_once ($_SERVER['DOCUMENT_ROOT'].'/pages/header.php'); ?>
<title>Food Service Vendor Orders</title>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Orders</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div style="height: 55px;padding:10px" class="panel-heading">
                    <button class="btn btn-secondary pull-left"><i class="fa fa-briefcase fa-fw"></i> Current Orders</button>
                    <a class="btn btn-primary pull-right" role="button" href="/pages/newOrder.php">New Order <span class="fa fa-plus-circle fa-fw"></span></a>
                </div>
                <div class="panel-body">
                    <table id="orders" class="table table-striped table-bordered"><?php
							$query = "SELECT * FROM `ORDER` ORDER BY PRODUCT_ID ASC";
        
							$result = $mysqli->query($query);
				
				        	//display column headers
				            echo "<thead>";
					        	echo "<th style='text-align:center' width=\"" . 100/mysqli_num_fields($result) . "%\">Product</th>";
	        					echo "<th style='text-align:center' width=\"" . 100/mysqli_num_fields($result) . "%\">Customer Name</th>";
					        	echo "<th style='text-align:center' width=\"" . 100/mysqli_num_fields($result) . "%\">Quantity</th>";
	        					echo "<th style='text-align:center' width=\"" . 100/mysqli_num_fields($result) . "%\">Price Each</th>";
	            				echo "<th style='text-align:center' width=\"" . 100/mysqli_num_fields($result) . "%\">Total Paid</th></tr>";
				            echo "</thead>";

				            //display the data
				            echo "<tbody>";
				            	while($row = mysqli_fetch_array($result)){
				                  	echo "<tr>";

				                  	//Product
				                  	if($product_name = $mysqli->query("
									    SELECT description
									    FROM product
									    WHERE product_id = " . $row['PRODUCT_ID'])){
									    if($product_name->num_rows > 0){
									    	$product_name = mysqli_fetch_array($product_name, MYSQLI_ASSOC);
								    		echo "<td align='center'>" . $product_name['description'] . "</td>";
	    						    	}
	    						    	else
	    						    		echo "<td align='center' style='padding: 2px;'>Invalid Product ID</td>";
	                		  		}
				            		else
	            			      		echo "<td align='center' style='padding: 2px;'>Invalid Entry</td>";

	        			          	//Customer
	                  				if($customer_name = $mysqli->query("SELECT name FROM customer WHERE idnumber = " . $row['CUST_IDNO'])){
									    if($customer_name->num_rows > 0){
									    	$customer_name = mysqli_fetch_array($customer_name, MYSQLI_ASSOC);
								    		echo "<td align='center'>" . $customer_name['name'] . "</td>";
	    						    	}
	    						    	else
	    						    		echo "<td align='center' style='padding: 2px;'>Invalid Customer ID</td>";
	                		  		}
				            		else
	            			      		echo "<td align='center' style='padding: 2px;'>Invalid Entry</td>";

	                  				//Quantity
				                  	echo "<td align='center'>" . $row['QUANTITY'] . "</td>";

				                  	//Price Each
				                  	echo "<td align='center'>$" . $row['PRICE_EACH'] . "</td>";

				                  	//Total Paid
				                  	echo "<td align='center'>$" . $row['TOTAL_PAID'] . "</td>";
				                  }
			                  ?>   
			            </tbody>
					</table>
                </div>
            </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->

<script type="text/javascript" charset="utf-8">
	window.onload = function() {
	   	$('#orders').DataTable();
    };
</script>
<?php
//Standard call for dependencies
include_once ($_SERVER['DOCUMENT_ROOT'].'/pages/footer.php');
?>