<?php include_once ($_SERVER['DOCUMENT_ROOT'].'/pages/header.php'); ?>
<title>Food Service Vendor Customer</title>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Customers</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div style="height: 55px;padding:10px" class="panel-heading">
                    <button class="btn btn-secondary pull-left"><i class="fa fa-briefcase fa-fw"></i> Customer Details</button>
                    <!-- <div class="col-sm-1"></div> -->
                    <a class="btn btn-primary" role="button" href="/pages/newCustomer.php">New Customer <span class="fa fa-plus-circle fa-fw"></span></a>
                    <a class="btn btn-danger pull-right" role="button" href="/pages/delCustomer.php">Remove Customer <span class="fa fa-close fa-fw"></span></a>
                </div>
                <div class="panel-body">
                    <table id="customers" class="table table-striped table-bordered"><?php
							$query = "SELECT name, phoneno, address, email, username, createddate FROM CUSTOMER ORDER BY IDNUMBER ASC";
        
							$result = $mysqli->query($query);
				
				        	//display column headers
				            echo "<thead>";
					        	echo "<th style='text-align:center' width=\"" . 100/mysqli_num_fields($result) . "%\">Name</th>";
	        					echo "<th style='text-align:center' width=\"" . 100/mysqli_num_fields($result) . "%\">Phone Number</th>";
					        	echo "<th style='text-align:center' width=\"" . 100/mysqli_num_fields($result) . "%\">Address</th>";
	        					echo "<th style='text-align:center' width=\"" . 100/mysqli_num_fields($result) . "%\">Email</th>";
	        					echo "<th style='text-align:center' width=\"" . 100/mysqli_num_fields($result) . "%\">Username</th>";
	        					echo "<th style='text-align:center' width=\"" . 100/mysqli_num_fields($result) . "%\">Creation Date</th>";
				            echo "</thead>";

				            //display the data
				            echo "<tbody>";
				            	while($row = mysqli_fetch_array($result)){
				                  	echo "<tr>";

				                  	//Name
				                  	echo "<td align='center'>" . $row['name'] . "</td>";

	        			          	//Phone Number
            			      		echo "<td align='center'>" . $row['phoneno'] . "</td>";
	                  				
	                  				//Address
                  					echo "<td align='center'>" . $row['address'] . "</td>";

				                  	//Email
				                  	echo "<td align='center'>" . $row['email'] . "</td>";

				                  	//Username
									echo "<td align='center'>" . $row['username'] . "</td>";
									
									//Creation Date
									echo "<td align='center'>" . date('F j Y', strtotime($row['createddate'])) . "</td>";
									
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
    <!-- NEW ROW HERE -->
</div>
<!-- /#page-wrapper -->

<script type="text/javascript" charset="utf-8">
	window.onload = function() {
	   	$('#customers').DataTable();
    };
</script>
<?php
//Standard call for dependencies
include_once ($_SERVER['DOCUMENT_ROOT'].'/pages/footer.php');
?>