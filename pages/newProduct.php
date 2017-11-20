<?php include_once ($_SERVER ['DOCUMENT_ROOT'] . '/pages/header.php'); ?>
<script src="jquery.js"> </script>
<title>Food Service Vendor New Product</title>

<body>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">New Product</h1>
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
                    <form name="newproduct" method="POST" enctype="multipart/form-data" action="/pages/insertProduct.php" onsubmit="return validateForm();">
                        <table class="table table-striped">
                            <tr width="10%">
                                <td>Product Name</td>
                                <td>
                                	<div class="form-group">
										<input type="text" class="form-control" id="description" name="description">
									</div>
                                </td>
                            </tr>
                            <tr>
                                <td>Type</td>
                                <td>
                                    <select class="form-control" name="prodType" id="prodType">
                                        <option value="" > Select Group</option>
                                        <option value="APPETIZER">APPETIZER</option>
                                        <option value="SALAD">SALAD</option>
                                        <option value="BEVERAGE">BEVERAGE</option>
                                        <option value="MAINDISH">MAINDISH</option>
                                        <option value="DESSERT">DESSERT</option> 
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Quantity</td>
                                <td>
                                	<div class="form-group">
										<input type="number" class="form-control" id="quantity" name="quantity" min="0" step="1">
									</div>
                                </td>
                            </tr>
                            <tr>
                                <td>Cost</td>
                                <td>
                                	<div class="form-group">
										<input type="number" class="form-control" id="cost" name="cost" placeholder="$.$$" min="0" step="0.01">
									</div>
                                </td>
                            </tr>
                            <tr>
                                <td>Product Image</td>
                                <td>
                                	<div class="form-group">
										<input type="file" class="form-control" id="fileName" name="fileName" accept="image/*">
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