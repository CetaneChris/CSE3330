<?php include_once ($_SERVER['DOCUMENT_ROOT'].'/pages/header.php');?>
<title>Food Service Vendor Products</title>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Products</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div style="height: 50px;padding:10" class="panel-heading">
                    <span class="fa fa-briefcase fa-fw" align="left"></span> Current Inventory
                    <a class="btn btn-primary btn-sm pull-right" role="button" href="/pages/newProduct.php"><span class="fa fa-plus-circle fa-fw"></span> New Product</a>
                </div>
                <div class="panel-body">
                    <table id="products" class="table table-striped table-bordered"><?php
							$query = "SELECT product_id, description, type, quantity, cost, product_image FROM PRODUCT ORDER BY product_id ASC";
        
							$result = $mysqli->query($query);
				
				        	//display column headers
				            echo "<thead>";
				            	echo "<th style='text-align:center' width=\"" . 100/mysqli_num_fields($result) . "%\">Product ID</th>";
					        	echo "<th style='text-align:center' width=\"" . 100/mysqli_num_fields($result) . "%\">Description</th>";
	        					echo "<th style='text-align:center' width=\"" . 100/mysqli_num_fields($result) . "%\">Type</th>";
					        	echo "<th style='text-align:center' width=\"" . 100/mysqli_num_fields($result) . "%\">Quantity</th>";
	        					echo "<th style='text-align:center' width=\"" . 100/mysqli_num_fields($result) . "%\">Cost</th>";
	            				echo "<th style='text-align:center' width=\"" . 100/mysqli_num_fields($result) . "%\">Image</th></tr>";
				            echo "</thead>";

				            //display the data
				            echo "<tbody>";
				            	while($row = mysqli_fetch_array($result)){
				                  	echo "<tr>";
				                  	
				                  	//Product ID
				                  	echo "<td align='center' style='padding: 15px'>" . $row['product_id'] . "</td>";

				                  	//Description
				                  	echo "<td align='center' style='padding: 15px'>" . $row['description'] . "</td>";

	        			          	//Type
				                  	echo "<td align='center' style='padding: 15px'>" . $row['type'] . "</td>";

	                  				//Quantity
				                  	echo "<td align='center' style='padding: 15px'>" . $row['quantity'] . "</td>";

				                  	//Cost
				                  	echo "<td align='center' style='padding: 15px'>$" . $row['cost'] . "</td>";

				                  	//Image
				                  	echo "<td align='center' style='padding: 15px'><img src=\"/images/" . $row['product_image'] . "\" alt=\"" . $row['description'] . "\" style=\"width:50px;height:50px\"></td>";
				                  	
				                  	echo "</tr>";
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
	   	$('#products').DataTable();
    };
</script>
<?php
//Standard call for dependencies
include_once ($_SERVER['DOCUMENT_ROOT'].'/pages/footer.php');
?>