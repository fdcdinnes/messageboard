<div class="col-sm-12 justify-content-md-center">					
	<div class="col-sm-6 col-md-offset-3">
		<form action="../users/update_account" method="post" enctype="multipart/form-data">
			
			<?php if(isset($_GET['error_update'])): ?>
			<?php endif;?>
			<div class="col-sm-12">						
				<h2><b>User Profile </b></h2>									
			</div>

			<div class="col-sm-12">						
				<div class="form-group">
					<?php echo $this->Flash->render('validationerror') ?>	
				</div>							
			</div>			

			<div class="col-sm-12">						
				<div class="col-sm-12 pdd-0">						
					<div class="col-sm-4 pdd-0">
						<?php 
							if($user['image'] != ''){
							echo $this->Html->image($user['image'], array("alt" => "alternative_text", "class" => "img-responsive", "id" => "output"));
							}else{
								echo $this->Html->image("D_users.jpe", array("alt" => "alternative_text", "class" => "img-responsive img-thumbnail", "id" => "output", "style" => "width:100%"));
							}
						 ?>
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
					<input type="text" id="name" class="form-control" name ="name" value="<?php echo $user['name'] ?>">
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="text" id="email" class="form-control" name ="email" value="<?php echo $user['email'] ?>">
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" id="editpassword" class="form-control" name ="password" value="default500">
				</div>
				<div id="divconpassword" class="form-group">
					<label>Confirm Password</label>
					<input type="password" id="conpassword" class="form-control" name ="conpassword" value="">
				</div>
				<div class="form-group">
					<label>Birthdate</label><span class="pull-right email-alert"></span>
				</div>
				<div class="input-group date" data-provide="datepicker">
				    <input type="text" class="form-control birthdate" name="birthdate" value="<?php echo $user['birthdate'] ?>">
				    <div class="input-group-addon">
				        <img src="../img/calendar.png">
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
						}else{
							$checked_Fm = 'checked';
						}
						echo '<input '. $checked_Ml .' type="radio" class="gender" name="gender" value="1"> Male';
						echo '<input '. $checked_Fm .' type="radio" class="gender" name="gender" value="2"> Female';
					?>								
					
				</div>	
				<div class="form-group">
					<label>Hubby</label>				
					<span class="pull-right confpassword-alert"></span>
					<textarea rows="9" class="form-control hubby" name="hubby"><?php echo $user['hubby']?></textarea>
				</div>					
			</div>
			<div class="col-sm-12">
				<?php 
					echo $this->Html->link(
                        'Cancel',
                        '/users/profile',
                        array('class' => 'btn btn-md btn-danger', 'target' => '')
                    ); 
				?>
				<button id="userupdate" class="btn btn-success">Update</button>
			</div>
		</form>
	</div>
	<div class="col-sm-6 col-md-offset-3">&nbsp;</div>
	<div class="col-sm-6 col-md-offset-3">&nbsp;</div>
	<div class="col-sm-6 col-md-offset-3">&nbsp;</div>
</div>