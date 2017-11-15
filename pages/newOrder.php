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
                        <i class="fa fa-shopping-cart fa-fw"></i> New Product
                    </div>
                    <form name="scform" method= "POST"  action="/service/insertProduct.php" onsubmit="return validateForm();">
                        <table class="table table-striped">
                            <tr>
                                <td>Description</td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" id="description" rows="1" name="description" style="resize: none"></textarea>
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
                                        <textarea class="form-control" id="quantity" rows="1" name="quantity" style="resize: none"></textarea>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Cost</td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" id="cost" rows="1" name="cost" style="resize: none"></textarea>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Product File Name</td>
                                <td>
                                	<div class="form-group">
                                        <textarea class="form-control" id="fileName" rows="1" name="fileName" style="resize: none"></textarea>
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
    </div>
    <!-- /.row -->
    <!-- /#page-wrapper -->
</body>
<script type="text/javascript">
    function validateRadio(radios){
    	for(i = 0; i< radios.length ; ++i){
    		if(radios[i].checked){
    			return true;
    		}
    	}
    	return false;
    }
    
    
    function validateForm(){
    	var dg = document.getElementById("prodType").value;
    	var dev= document.getElementById("deviceList").value;
    	var radiocheck= false;
    	if(validateRadio(document.forms["scform"]["optradio"])){
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
<!-- The following script gets the response for device dropdown using dg_id from the group selection -->
<?php
    // Standard call for dependencies
    include_once ($_SERVER ['DOCUMENT_ROOT'] . '/pages/footer.php');
    ?>