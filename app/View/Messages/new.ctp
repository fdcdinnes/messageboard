<div class="col-sm-12 justify-content-md-center">					
	<div class="col-sm-6 col-md-offset-3">							
			<div class="col-sm-12">	
				<div class="col-sm-8 pdd-0">					
					<h2><b>New Message</b></h2>
				</div>							
			</div>
			<div class="col-sm-12">		
				<form action = "send" method="post">
					<div class="form-group">
						<label>To:</label>
						<select class="js-example-basic-single" name="to_id" style="width:100%">
							<?php 
								foreach($Users as $uRkey => $user):
									$imguser = '../img/' . $user['User']['image'];
									if($user['User']['image'] == ''){
										$imguser = "../img/D_users.jpe";
									}
									echo '<option value="'. $user['User']['id'].'" data-image="'. $imguser .'">'. $user['User']['name'] .'</option>';
								endforeach;
							?>
					    </select>
					</div>
					<div class="form-group">
						<label>Message</label>
						<textarea class="form-control" rows="5" name="content" placeholder="can be your text here.."></textarea>
					</div>	
					<div class="form-group">
						<a href="../messages" class="btn btn-danger"> Cancel</a>
						<input type="submit" name="submit" value=" Send " class="btn btn-primary">
					</div>
				</form>
			</div>
			
	</div>
	<div class="col-sm-6 col-md-offset-3">&nbsp;</div>
	<div class="col-sm-6 col-md-offset-3">&nbsp;</div>
	<div class="col-sm-6 col-md-offset-3">&nbsp;</div>
</div>