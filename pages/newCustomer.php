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
                        <i class="fa fa-shopping-cart fa-fw"></i> All fields are required
                    </div>
                    <form name="newcustomer" method= "POST"  action="/pages/insertCustomer.php" onsubmit="return validateForm();">
                        <table class="table table-striped">
                            <tr>
                                <td>Name</td>
                                <td>
                                	<div class="form-group">
										<input type="text" class="form-control" id="name" name="name">
									</div>
                                </td>
                            </tr>
                            <tr>
                                <td>Phone Number</td>
                                <td>
                                	<div class="form-group">
										<input type="telephone" class="form-control" id="pno" name="pno" placeholder="XXX-XXX-XXXX">
									</div>
                                </td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>
                                	<div class="form-group">
										<input type="text" class="form-control" id="address" name="address" placeholder="1234 Main Street, Arlington, Texas 76013">
									</div>
                                </td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>
                                	<div class="form-group">
										<input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="example@server.com">
										<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
									</div>
                                </td>
                            </tr>
                            <tr>
                                <td>Username</td>
                                <td>
                                	<div class="form-group">
                                        <input type="text" class="form-control" id="username" name="username">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td>
                                    <div class="form-group">
										<input type="password" class="form-control" id="password" name="password">
									</div>
                                </td>
                            </tr>
                            <tr>
                                <td>Confirm Password</td>
                                <td>
                                    <div class="form-group">
										<input type="password" class="form-control" id="conf_password" name="conf_password">
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
    function validateForm(){
    	var name  = document.getElementById("name").value;
    	var pno   = document.getElementById("pno").value;
    	var addr  = document.getElementById("address").value;
    	var email = document.getElementById("email").value;
    	var uname = document.getElementById("username").value;
    	var pass  = document.getElementById("password").value;
    	var conf_pass  = document.getElementById("conf_password").value;

    	if(pass != conf_pass){
    		document.getElementById('errordiv').style.display = 'block';
    
    		document.getElementById("errormessage").innerHTML = "Password fields do not match";
    		
    		return false;
    	}
    
    	if(name == "" || pno == "" ||  addr == "" || email == "" || uname == "" || pass == ""){
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