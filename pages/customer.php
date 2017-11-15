<?php
/*
 *   CC BY-NC-AS UTA FabLab 2016-2017
 *   FabApp V 0.9
 */
include_once ($_SERVER['DOCUMENT_ROOT'].'/pages/header.php');
?>
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
                <div class="panel-heading">
                    <i class="fa fa-briefcase fa-fw"></i> Customer Details
                </div>
                <div class="panel-body">
                    <table id="customers" class="table table-striped table-bordered"><?php
							$query = "SELECT name, phoneno, address, email, username, createddate FROM CUSTOMER ORDER BY IDNUMBER";
        
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
				                  	echo "<td align='center' style='padding: 15px'>" . $row['name'] . "</td>";

	        			          	//Phone Number
            			      		echo "<td align='center' style='padding: 15px'>" . $row['phoneno'] . "</td>";
	                  				
	                  				//Address
                  					echo "<td align='center' style='padding: 15px'>" . $row['address'] . "</td>";

				                  	//Email
				                  	echo "<td align='center' style='padding: 15px'>" . $row['email'] . "</td>";

				                  	//Username
									echo "<td align='center' style='padding: 15px'>" . $row['username'] . "</td>";
									
									//Creation Date
									echo "<td align='center' style='padding: 15px'>" . date('F j', strtotime($row['createddate'])) . "</td>";
									
									echo "</tr>";
				                  }
			                  ?>   
			            </tbody>
					</table>
                </div>
            </div>
            <a class="btn btn-primary" role="button" href="/pages/newCustomer.php"><span class="fa fa-plus-circle fa-fw"></span> New Customer</a>
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