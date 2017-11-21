<!-- 
	Christopher Raymond & Laramie DeBaun	
	Databases 2017 fall
	Homepage
 -->
<?php include_once ($_SERVER['DOCUMENT_ROOT'].'/pages/header.php'); ?>
<title>Food Service Vendor Home</title>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Home</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-briefcase fa-fw"></i> Inventory
                </div>
                <div class="panel-body">
                    <table id="products" class="table table-striped table-bordered"><?php
							$query = "SELECT product_id, description, type, quantity, cost, product_image FROM PRODUCT WHERE QUANTITY > 0 ORDER BY product_id ASC";
        
							$result = $mysqli->query($query);
				
				        	//display column headers
				            echo "<thead>";
					        	echo "<th style='text-align:center' width=\"" . 100/mysqli_num_fields($result) . "%\">Product</th>";
	        					echo "<th style='text-align:center' width=\"" . 100/mysqli_num_fields($result) . "%\">Cost</th>";
	            				echo "<th style='text-align:center' width=\"" . 100/mysqli_num_fields($result) . "%\">Image</th></tr>";
				            echo "</thead>";

				            //display the data
				            echo "<tbody>";
				            	while($row = mysqli_fetch_array($result)){
				                  	echo "<tr>";
				                  	
				                  	//Product
				                  	echo "<td align='center'>" . $row['description'] . "</td>";

				                  	//Cost
				                  	echo "<td align='center'>$" . $row['cost'] . "</td>";

				                  	//Image
				                  	echo "<td align='center'><img src=\"/images/" . $row['product_image'] . "\" alt=\"" . $row['description'] . "\" style=\"width:50px;height:50px\"></td>";
				                  	
				                  	echo "</tr>";
				                  }
			                  ?>   
			            </tbody>
					</table>
                </div>
            </div>
        </div>
        <!-- /.col-lg-8 -->
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-child fa-fw"></i> Customers
                </div>
                <div class="panel-body">
					<table id="history" class="table table-striped table-bordered"><?php
						$query = "SELECT name, idnumber FROM CUSTOMER ORDER BY IDNUMBER ASC";
        
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

				               	//Device Name
				               	echo "<td align='center'>" . $row['name'] . "</td>";

        			          	//By
				               	echo "<td align='center'>" . $row['idnumber'] . "</td>";
							}
			                  ?>   
			            </tbody>
					</table>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
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