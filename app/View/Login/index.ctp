<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Message Board | login</title>
<?php echo $this->Html->css('font-css'); ?>
<?php echo $this->Html->css('font-icon'); ?>
<?php echo $this->Html->css('fontawesome-min'); ?>
<?php echo $this->Html->css('bootstrap-min'); ?>
<?php echo $this->Html->css('select2'); ?>
<?php echo $this->Html->css('bootstrap-datepicker.min'); ?>
<?php echo $this->Html->css('custom_css'); ?>

<?php echo $this->Html->script('jquery-1.12.4.min');?>
<?php echo $this->Html->script('bootstrap.min');?>
<?php echo $this->Html->script('bootstrap-datepicker.min');?>
<?php echo $this->Html->script('main');?>
<?php echo $this->Html->script('select2');?>


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

							<div class="col-sm-12">		
								<?php echo $this->Flash->render('loginError') ?>	
							</div>							
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