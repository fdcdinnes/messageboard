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
<?php echo $this->Html->css('bootstrap-datepicker.min'); ?>
<?php echo $this->Html->css('custom_css'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php echo $this->Html->script('bootstrap-datepicker.min');?>
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
						<a href="../../users/logout" class="btn btn-danger"><span>Logout</span></a>
						<a href="../../messages" class="btn btn-success"><span>Messages</span></a>
						<a href="../../users/profile/<?php echo $user['id']?>" class="btn btn-success"><span>Profile</span></a>
					</div>
                </div>
            </div>
         	
         	<div class="row">
                <div class="col-sm-12 justify-content-md-center">
					
					<div class="col-sm-6 col-md-offset-3">
						<form action="../../users/update_account/<?php echo base64_encode($user['id'])?>" method="post" enctype="multipart/form-data">
							
							<?php if(isset($_GET['error_update'])): ?>
							<?php endif;?>

							<div class="col-sm-12">						
								<h2><b>User Profile </b></h2>									
							</div>
							<div class="col-sm-12">						
								<div class="col-sm-12 pdd-0">						
									<div class="col-sm-4 pdd-0">
										<?php if($user['image'] != ''):

											echo $this->Html->image($user['image'], array("alt" => "alternative_text", "class" => "img-responsive", "id" => "output"));

										else: ?>
											<img id="output" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTGSlfCyewmhkjDINdHMeYnEhwqbcBRS_UBzqxUOuM94aLTYJ5b" class="img-responsive" alt="Cinque Terre">
										<?php endif; ?>
									</div>
									<div class="col-sm-8 pdd-15-l">	
										<div class="file btn btn-lg btn-primary uploadfil">
											Upload
											<?php if($user['image'] != ''): ?>
												<input type="file" name="image" class="uploadfil" accept="image/x-png,image/gif,image/jpeg" value="default000" onchange="loadFile(event)"/>
											<?php else: ?>
												<input type="file" name="image" class="uploadfil" accept="image/x-png,image/gif,image/jpeg" value="default000" required onchange="loadFile(event)"/>
											<?php endif; ?>
											
										</div>
									</div>
								</div>
							</div>

							<div class="col-sm-12">						
								<div class="form-group">
									<label>Name</label>
									<?php if(isset($_GET['error_update']) && $_GET['error_update'] == 'name'): ?>
										<span class="pull-right name-alert">*Name should be 5-20 Characters</span>
									<?php endif;?>
									<input type="text" id="name" class="form-control" name ="name" value="<?php echo $user['name'] ?>">
								</div>
								<div class="form-group">
									<label>Birthdate</label><span class="pull-right email-alert"></span>
									<!-- <input id="datepicker" type="date" class="form-control birthdate" name="birthdate" value="<?php echo $user['birthdate'] ?>"> -->
								</div>
								<div class="input-group date" data-provide="datepicker">
								    <input type="text" class="form-control birthdate" name="birthdate" value="<?php echo $user['birthdate'] ?>">
								    <div class="input-group-addon">
								        <span class="glyphicon glyphicon-th"></span>
								    </div>
								</div>
								<div class="form-group">
									<label>Gender&nbsp;&nbsp;&nbsp;</label><span class="pull-right password-alert"></span>
									<?php
										$checked_Ml = '';
										$checked_Fm = '';
										$checked_df = '';
										if($user['gender'] == 1){
											$checked_Ml = 'checked';
										}elseif($user['gender'] == 2){
											$checked_Fm = 'checked';
										}
										echo '<input '. $checked_Ml .' type="radio" class="gender" name="gender" value="1"> Male';
										echo '<input '. $checked_Fm .' type="radio" class="gender" name="gender" value="2"> Female';
									?>								
									
								</div>	
								<div class="form-group">
									<label>Hubby</label>
									<?php if(isset($_GET['error_update']) && $_GET['error_update'] == 'hubby'): ?>
										<span class="pull-right name-alert">*Please provide your hubby </span>
									<?php endif;?>
									<span class="pull-right confpassword-alert"></span>
									<textarea rows="9" class="form-control hubby" name="hubby" required><?php echo $user['hubby']?></textarea>
								</div>					
							</div>
							<div class="col-sm-12">
								<a href="../../users/profile/<?php echo $user['id'] ?>" id="userupdate" class="btn btn-primary">Cancel</a>
								<button id="userupdate" class="btn btn-success">Update</button>
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
</body>
</html>                                		                            