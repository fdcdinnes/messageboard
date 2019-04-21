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
						<a href="../../users/logout" class="btn btn-danger"><span>Logout</span></a>
						<a href="../../messages" class="btn btn-success"><span>Messages</span></a>
						<a href="../../users/profile/<?php echo $user['id']?>" class="btn btn-success"><span>Profile</span></a>
					</div>
                </div>
            </div>
         	
         	<div class="row">
                <div class="col-sm-12 justify-content-md-center">
					
					<div class="col-sm-6 col-md-offset-3">
						<form action="login/userlogin" method="post">
							
							<div class="col-sm-12">						
								<h2><b>User Profile</b></h2>									
							</div>
							<div class="col-sm-12">						
								<div class="col-sm-12 pdd-0">						
									<div class="col-sm-4" style="padding: 2em 0 0 0!important">
										<?php if($user['image'] != ''):

											echo $this->Html->image($user['image'], array("alt" => "alternative_text", "class" => "img-responsive img-thumbnail", "id" => "output"));

										else:
											echo '<img src="../../img/D_users.jpe"  class="img-responsive img-thumbnail" style="width: 100%">';
										endif; ?>
									</div>
									<div class="col-sm-8 pdd-15-l">	
										<ul class="list-group">
										  <li class="list-group-item border-0"><h3><?php echo $user['name'] .'  '. $user['age']; ?> </h3></li>
										  <li class="list-group-item border-0 pdd-15-l">Gender: <?php echo $user['Labelgender']; ?></li>
										  <li class="list-group-item border-0 pdd-15-l">Birthdate: <?php  echo $user['ConBirthDate'];;?> </li>
										  <li class="list-group-item border-0 pdd-15-l">Joined: <?php  echo $user['dateJoined'];?></li>
										  <li class="list-group-item border-0 pdd-15-l">Last Login: <?php  echo $user['lastLoginIn'];;?></li>
										</ul>
									</div>
								</div>
							</div>

							<div class="col-sm-12">
								<br />						
								<label>Hubby</label>
								<p><?php echo $user['hubby'] ?></p>
							</div>
							<div class="col-sm-6 col-md-offset-3">&nbsp;</div>
							<div class="col-sm-6 col-md-offset-3">&nbsp;</div>
							<div class="col-sm-12">
								<a href="../../users/edit/<?php echo $user['id']?>" type="submit" class="btn btn-success">Edit Profile</a>
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