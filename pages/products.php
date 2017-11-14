<?php
/*
 *   CC BY-NC-AS UTA FabLab 2016-2017
 *   FabApp V 0.9
 */
include_once ($_SERVER['DOCUMENT_ROOT'].'/pages/header.php');
?>
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
                <div class="panel-heading">
                    <i class="fa fa-briefcase fa-fw"></i> Current Inventory
                </div>
                <div class="panel-body">
                    <table id="history" class="table table-striped table-bordered"><?php
							$query = "SELECT DESCRIPTION, TYPE, QUANTITY, COST, PRODUCT_IMAGE FROM PRODUCT";
        
							$result = $mysqli->query($query);
				
				        	//display column headers
				            echo "<thead>";
					        	echo "<th style='text-align:center' width=\"" . 100/(mysqli_num_fields($result)+3) . "%\">Description</th>";
	        					echo "<th style='text-align:center' width=\"" . 100/(mysqli_num_fields($result)+3) . "%\">Type</th>";
					        	echo "<th style='text-align:center' width=\"" . 100/(mysqli_num_fields($result)+3) . "%\">Quantity</th>";
	        					echo "<th style='text-align:center' width=\"" . 100/(mysqli_num_fields($result)+3) . "%\">Cost</th>";
	            				echo "<th style='text-align:center' width=\"" . 4*(100/(mysqli_num_fields($result)+3)) . "%\">Image</th></tr>";
				            echo "</thead>";

				            //display the data
				            echo "<tbody>";
				            	while($row = mysqli_fetch_array($result)){
				                  	echo "<tr>";

				                  	//Device Name
				                  	echo "<td align='center' style='padding: 15px'>";
				                  	foreach($deviceList as $rowDev){
				                  		if($row['d_id'] == $rowDev['d_id']){
				                  			$deviceName = $rowDev['device_desc'];
	        			          			break;
	                  					}
	                  				}

		                  			echo $deviceName;
	                  				echo "</td>";

	        			          	//By
	                  				if($staffIcon = $mysqli->query("
									    SELECT icon
									    FROM users
									    WHERE operator = " . $row['staff_id'])){
									    if($staffIcon->num_rows > 0){
									    	$staffIcon = mysqli_fetch_array($staffIcon, MYSQLI_ASSOC);
								    		echo "<td align='center' style='padding: 15px'><i class='fa fa-" . $staffIcon['icon'] . " fa-lg fa-fw'></i></td>";
	    						    	}
	    						    	else
	    						    		echo "<td align='center' style='padding: 2px;'>Invalid User ID</td>";
	                		  		}
				            		else
	            			      		echo "<td align='center' style='padding: 2px;'>Invalid User ID</td>";

	                  				//Reply Count
				                  	if($rows = $mysqli->query("SELECT * FROM reply WHERE sc_id = " . $row['sc_id'])){
	            			      		$row_cnt = $rows->num_rows;
	                  					echo "<td align='center' style='padding: 15px'><a href = '/service/individualHistory.php?service_call_id=".$row['sc_id']."'>" . $row_cnt . "</td>";
				                  	}
	            			      	else
	                  					echo "<td align='center' style='padding: 15px'>There was an error loading the reply count</td>";

				                  	//Solved
				                  	echo "<td align='center' style='padding: 15px'>";
				                  	if($row['solved'] == 'Y'){
				                  		echo 'Complete';
				                  	} else {
				                  		echo 'Incomplete';
				                  	}
				                  	echo "</td>";

				                  	//Service Notes
				                  	if($serviceLevel = $mysqli->query("SELECT msg FROM service_lvl WHERE sl_id = " . $row['sl_id'])){
										if($serviceLevel->num_rows > 0){
											$serviceLevel = mysqli_fetch_array($serviceLevel, MYSQLI_ASSOC);
											echo "<td align='center' style='padding: 15px'><strong>" . $serviceLevel['msg'] . "</strong> - " . $row['sc_notes'] . "</td>";
										}
										else
											echo "<td align='center' style='padding: 2px'>Invalid Service Level</td>";
									}
									else
										echo "<td align='center' style='padding: 15px'>Invalid Service Level</td>";
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
	   	$('#history').DataTable();
    };
</script>
<?php
//Standard call for dependencies
include_once ($_SERVER['DOCUMENT_ROOT'].'/pages/footer.php');
?>