<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap CRUD Data Table for Database with Modal Form</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<?php echo $this->Html->css('custom_css'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php echo $this->Html->script('main');?>


</head>
<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Message <b>Board</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Register</span></a>
					</div>
                </div>
            </div>
         	
         	<div class="row">
                <div class="col-sm-12 justify-content-md-center">
					
					<div class="col-sm-4 col-md-offset-4">
						<form action="login/userlogin" method="post">
							
							<div class="col-sm-12">						
								<h2><b>Login</b></h2>
							</div>

							<?php if(isset($_GET['error_login'])): ?>
							<div class="col-sm-12">		
								<div class="col-sm-12 alert alert-danger text-center">
									<span> Email or Password undefined</span>									
								</div>				
							</div>
							<?php endif; ?>
							<div class="modal-body">					
								<div class="form-group">
									<label>Email</label>
									<input type="email" name="email" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Password</label>
									<input type="password" name="password" class="form-control" required>
								</div>				
							</div>
							<div class="col-sm-12">
								<input type="submit" class="btn btn-success" value="Login">
							</div>
						</form>
					</div>
					<div class="col-sm-6 col-md-offset-3">&nbsp;</div>
					<div class="col-sm-6 col-md-offset-3">&nbsp;</div>
					<div class="col-sm-6 col-md-offset-3">&nbsp;</div>
				</div>
            </div>
        </div>
    </div>
	<!-- Edit Modal HTML -->
	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">						
					<h4 class="modal-title">REGISTRATION</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">	
					<div class="form-group">
						<div id="registerError" class="alert alert-danger" role="alert"></div>
					</div>
					<div class="form-group">
						<label>Name</label>
						<input type="text" id="name" class="form-control">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" id="email" class="form-control">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" id="password" class="form-control">
					</div>	
					<div class="form-group">
						<label>Confirm Password</label>
						<input type="password" id="confpassword" class="form-control">
					</div>					
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success" value="Register" onclick="onRegister();">
				</div>
			</div>
		</div>
	</div>

</body>
</html>                                		                            