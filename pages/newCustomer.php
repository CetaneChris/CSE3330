<?php include_once ($_SERVER ['DOCUMENT_ROOT'] . '/pages/header.php'); ?>
<script src="jquery.js"> </script>
<title>Food Service Vendor New Customer</title>

<body>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">New Customer</h1>
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
                        <i class="fa fa-shopping-cart fa-fw"></i> New Customer
                    </div>
                    <form name="scform" method= "POST"  action="/service/insertCustomer.php" onsubmit="return validateForm();">
                        <table class="table table-striped">
                            <tr>
                                <td>Name</td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" id="name" rows="1" name="name" style="resize: none"></textarea>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Phone Number</td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" id="pno" rows="1" name="pno" style="resize: none"></textarea>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" id="address" rows="1" name="address" style="resize: none"></textarea>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>
                                    <div class="form-group">
                                        <textarea class="form-control" id="email" rows="1" name="email" style="resize: none"></textarea>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Username</td>
                                <td>
                                	<div class="form-group">
                                        <textarea class="form-control" id="username" rows="1" name="username" style="resize: none"></textarea>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td>
                                	<div class="form-group">
                                        <textarea class="form-control" id="password" rows="1" name="password" style="resize: none"></textarea>
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