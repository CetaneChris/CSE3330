<?php include_once ($_SERVER ['DOCUMENT_ROOT'] . '/pages/header.php'); ?>
<script src="jquery.js"> </script>
<title>Food Service Vendor New Product</title>

<body>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Order Form</h1>
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
                        <i class="fa fa-shopping-cart fa-fw"></i> New Order
                    </div>
                    <form name="neworder" method= "POST"  action="/pages 	/insertProduct.php" onsubmit="return validateForm();">
                        <table class="table table-striped">
                            <tr>
                                <td>Product ID</td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" id="prod" rows="1" name="prod" style="resize: none"></textarea>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Customer ID</td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" id="cust" rows="1" name="cust" style="resize: none"></textarea>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Quantity</td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" id="quantity" rows="1" name="quantity" style="resize: none"></textarea>
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
					<i class="fa fa-shopping-cart fa-fw"></i> Customers
				</div>
				<div class="panel-body">
                    <table id="customers" class="table table-striped table-bordered"><?php
							$query = "SELECT name, idnumber FROM CUSTOMER ORDER BY IDNUMBER";
        
							$result = $mysqli->query($query);
				
				        	//display column headers
				            echo "<thead>";
					        	echo "<th style='text-align:center' width=\"" . 100/mysqli_num_fields($result) . "%\">Name</th>";
	        					echo "<th style='text-align:center' width=\"" . 100/mysqli_num_fields($result) . "%\">ID Number</th>";
				            echo "</thead>";

				            //display the data
				            echo "<tbody>";
				            	while($row = mysqli_fetch_array($result)){
				                  	echo "<tr>";

				                  	//Name
				                  	echo "<td align='center' style='padding: 15px'>" . $row['name'] . "</td>";

	        			          	//Phone Number
            			      		echo "<td align='center' style='padding: 15px'>" . $row['idnumber'] . "</td>";

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
					<i class="fa fa-shopping-cart fa-fw"></i> Products
				</div>
				<div class="panel-body">
                    <table id="products" class="table table-striped table-bordered"><?php
							$query = "SELECT description, product_id FROM PRODUCT ORDER BY product_id ASC";
        
							$result = $mysqli->query($query);
				
				        	//display column headers
				            echo "<thead>";
					        	echo "<th style='text-align:center' width=\"" . 100/mysqli_num_fields($result) . "%\">Description</th>";
				            	echo "<th style='text-align:center' width=\"" . 100/mysqli_num_fields($result) . "%\">Product ID</th>";
				            echo "</thead>";

				            //display the data
				            echo "<tbody>";
				            	while($row = mysqli_fetch_array($result)){
				                  	echo "<tr>";

				                  	//Description
				                  	echo "<td align='center' style='padding: 15px'>" . $row['description'] . "</td>";

				                  	//Product ID
				                  	echo "<td align='center' style='padding: 15px'>" . $row['product_id'] . "</td>";

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
    	var name = document.getElementById("prodType").value;
    	var dev= document.getElementById("deviceList").value;
    	var radiocheck= false;
    	if(validateRadio(document.forms["neworder"]["optradio"])){
    		radiocheck = true;
    	}
    
    
    	
    	var notes = document.getElementById("notes").value;
    
    	if(dg == "" || dev == "" ||  notes =="" || radiocheck == false){
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