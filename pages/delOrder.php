<!-- 
	Christopher Raymond & Laramie DeBaun	
	Databases 2017 fall
	Order Deletion Page
 -->
<?php include_once ($_SERVER ['DOCUMENT_ROOT'] . '/pages/header.php'); ?>
<script src="jquery.js"> </script>
<title>Food Service Vendor Refund</title>

<body>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Refund</h1>
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
                    <form name="order" method= "POST"  action="/pages/removeOrder.php" onsubmit="return validateForm();">
                        <table class="table table-striped">
                            <tr>
                                <td>Order ID</td>
                                <td>
	                                <select class="form-control" id="order" name="order">
									<?php
										$order_list = "SELECT order_num FROM `order` ORDER BY order_num ASC";
										echo "<option value=\"\" > Select Order</option>";
											
										if ($orders = $mysqli->query ($order_list)) {
											while ($order = mysqli_fetch_array($orders) ) {
												echo "<option value=" . $order['order_num'] . ">" . $order['order_num'] . "</option>";
											}
										}
										else
											die("There was an error loading orders");
									?>
									</select>
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
            <div class="col-lg-8">
            <div class="panel panel-default">
				<div class="panel-heading">
					<i class="fa fa-shopping-cart fa-fw"></i> Orders
				</div>
				<div class="panel-body">
                    <table id="orders" class="table table-striped table-bordered"><?php
							$query = "SELECT O.ORDER_NUM AS ORDER_NUM, C.NAME AS NAME, P.DESCRIPTION AS DESCRIPTION, O.QUANTITY AS QUANTITY, O.TOTAL_PAID AS TOTAL_PAID
								FROM `ORDER` O
								LEFT OUTER JOIN PRODUCT P ON O.PRODUCT_ID = P.PRODUCT_ID
								LEFT OUTER JOIN CUSTOMER C ON O.CUST_IDNO = C.IDNUMBER
								ORDER BY O.ORDER_NUM ASC";
        
							$result = $mysqli->query($query);
				
				        	//display column headers
				            echo "<thead>";
					        	echo "<th style='text-align:center' width=\"" . 100/mysqli_num_fields($result) . "%\">Order Number</th>";
	            				echo "<th style='text-align:center' width=\"" . 100/mysqli_num_fields($result) . "%\">Customer Name</th>";
	            				echo "<th style='text-align:center' width=\"" . 100/mysqli_num_fields($result) . "%\">Product</th>";
	            				echo "<th style='text-align:center' width=\"" . 100/mysqli_num_fields($result) . "%\">Quantity</th>";
	            				echo "<th style='text-align:center' width=\"" . 100/mysqli_num_fields($result) . "%\">Total</th>";
				            echo "</thead>";

				            //display the data
				            echo "<tbody>";
				            	while($row = mysqli_fetch_array($result)){
				                  	echo "<tr>";

				                  	//Order Number
				                  	echo "<td align='center'>" . $row['ORDER_NUM'] . "</td>";

	        			          	//Customer Name
            			      		echo "<td align='center'>" . $row['NAME'] . "</td>";

            			      		//Product
            			      		echo "<td align='center'>" . $row['DESCRIPTION'] . "</td>";

            			      		//Quantity
            			      		echo "<td align='center'>" . $row['QUANTITY'] . "</td>";

            			      		//Total
            			      		echo "<td align='center'>" . $row['TOTAL_PAID'] . "</td>";

            			      		echo "</tr>";
				            	}
			            	?>
			            </tbody>
					</table>
                </div>
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
    	var cust = document.getElementById("cust").value;

		if(cust == ""){
    		document.getElementById('errordiv').style.display = 'block';
    
    		document.getElementById("errormessage").innerHTML = "Please choose a customer";
    		
    		return false;
    	}
    }

    window.onload = function() {
	   	$('#orders').DataTable();
    };
</script>
<?php
    // Standard call for dependencies
    include_once ($_SERVER ['DOCUMENT_ROOT'] . '/pages/footer.php');
    ?>