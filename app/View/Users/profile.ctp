<div class="col-sm-12 justify-content-md-center">					
	<div class="col-sm-6 col-md-offset-3">
		<form action="login/userlogin" method="post">
			
			<div class="col-sm-12">						
				<h2><b>User Profile</b></h2>												
			</div>
			<div class="col-sm-12">						
				<div class="col-sm-12 pdd-0">						
					<div class="col-sm-4" style="padding: 2em 0 0 0!important">
						<?php 
							if($user['image'] != ''){
								echo $this->Html->image($user['image'], array("alt" => "alternative_text", "class" => "img-responsive img-thumbnail", "id" => "output"));
							}else{
								echo $this->Html->image("D_users.jpe", array("alt" => "alternative_text", "class" => "img-responsive img-thumbnail", "id" => "output", "style" => "width:100%"));
							}
						?>
					</div>
					<div class="col-sm-8 pdd-15-l">	
						<ul class="list-group">
						  <li class="list-group-item border-0"><h3><?php echo $user['name'] .'  '. $user['age']; ?> </h3></li>
						  <li class="list-group-item border-0 pdd-15-l">Gender: <?php echo $user['Labelgender']; ?></li>
						  <li class="list-group-item border-0 pdd-15-l">Email: <?php  echo $user['email'];;?></li>
						  <li class="list-group-item border-0 pdd-15-l">Birthdate: <?php  echo $user['ConBirthDate'];?> </li>
						  <li class="list-group-item border-0 pdd-15-l">Joined: <?php  echo $user['dateJoined'];?></li>
						  <li class="list-group-item border-0 pdd-15-l">Last Login: <?php  echo $user['lastLoginIn'];?></li>
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
				<?php 
					echo $this->Html->link(
                            'Edit Profile',
                            '/users/edit',
                            array('class' => 'btn btn-md btn-success', 'target' => '')
                        ); 
				?>
			</div>
		</form>
	</div>
<div class="col-sm-6 col-md-offset-3">&nbsp;</div>
<div class="col-sm-6 col-md-offset-3">&nbsp;</div>
<div class="col-sm-6 col-md-offset-3">&nbsp;</div>
</div>