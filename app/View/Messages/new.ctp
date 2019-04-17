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
<?php echo $this->Html->css('select2'); ?>
<?php echo $this->Html->css('custom_css'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php echo $this->Html->script('select2');?>
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
						<a href="../users/logout" class="btn btn-danger"><span>Logout</span></a>
						<a href="../messages" class="btn btn-success"><span>Messages</span></a>
						<a href="../users/profile/<?php echo $_SESSION['user_id']?>" class="btn btn-success"><span>Profile</span></a>
					</div>
                </div>
            </div>
         	
         	<div class="row">
                <div class="col-sm-12 justify-content-md-center">
					
					<div class="col-sm-6 col-md-offset-3">
							
							<div class="col-sm-12">	
								<div class="col-sm-8">					
									<h2><b>Message List</b></h2>
								</div>	
								<div class="col-sm-4 text-right pdd-15-t">
									<a href="users/logout" class="btn btn-primary"><span>New Message</span></a>
								</div>							
							</div>
							<div class="col-sm-12">		
								<div class="form-group">
									<label>To:</label>
									<!-- <input type="text" class="form-control" required> -->
									<select class="js-example-basic-single" style="width:100%">
										<?php 

											foreach($Users as $uRkey => $user):
												echo '<option value="$user[User][id]">'. $user['User']['name'] .'</option>';
											endforeach;
										?>
								    </select>
								</div>
								<div class="form-group">
									<label>Message</label>
									<textarea class="form-control" rows="5" required placeholder="can be your message here.."></textarea>
								</div>	
							</div>
							
					</div>
					<div class="col-sm-6 col-md-offset-3">&nbsp;</div>
					<div class="col-sm-6 col-md-offset-3">&nbsp;</div>
					<div class="col-sm-6 col-md-offset-3">&nbsp;</div>
				</div>
            </div>
        </div>
    </div>

    <!-- Delete Modal HTML -->
	<div id="deleteEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Delete Message</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>Are you sure you want to delete these Records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-danger delete-Message" data-dismiss="modal" value="Delete" for="0">
					</div>
				</form>
			</div>
		</div>
	</div>

</body>
</html>                                		                            