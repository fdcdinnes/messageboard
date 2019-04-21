<div class="col-sm-12 justify-content-md-center">					
	<div class="col-sm-6 col-md-offset-3">							
			<div class="col-sm-12">	
				<div class="col-sm-8 pdd-0">					
					<h2><b>Messages</b></h2>
				</div>							
			</div>

			<div class="col-sm-12">		
				<form action = "../sendreply" method="post">
					<div class="form-group">
						<label>To:</label>
						<span class="row">
							<?php
								$imguser = '../../img/' . $Users['User']['image'];
								if($Users['User']['image'] == ''){
									$imguser = "../../img/D_users.jpe";
								}
								echo '&nbsp;&nbsp;&nbsp;&nbsp;<img src="'. $imguser .'" class="img-circle" width="25">&nbsp;&nbsp;' . $Users['User']['name'];
							?>
						</span>
					</div>

					<div class="form-group">
						<div class="col-md-12 convolist">
							<br />
							<?php 
								foreach($messages as $keymsg => $myconvo){
									if($_SESSION['user_id'] == $myconvo['FromUser']['id']){
										echo '<div class="col-md-11 alert alert-info pull-right" role="alert">';
								  		echo '	<p>'. $myconvo['Message']['content'].'</p>';
										echo '  <hr class="ln-5">';
										echo '  <p class="mb-0"><img src="../../img/'. $myconvo['FromUser']['image'] .'" width="25" class="img-circle">&nbsp;&nbsp; You <span class="pull-right">'. date('Y/m/d h:i:s a', strtotime($myconvo['Message']['created'])).'</span></p>';
										echo '</div>';
									}else{
										echo '<div class="col-md-11 alert alert-success pull-left" role="alert">';
								  		echo '	<p>'. $myconvo['Message']['content'].'</p>';
										echo '  <hr class="ln-5">';
										echo '  <p class="mb-0"><img src="../../img/'. $myconvo['FromUser']['image'] .'" width="25" class="img-circle">&nbsp;&nbsp;'. $myconvo['FromUser']['name'] .' <span class="pull-right">'. date('Y/m/d h:i:s a', strtotime($myconvo['Message']['created'])).'</span></p>';
										echo '</div>';
									}

								}
							?>
						</div>
					</div>

					<div class="form-group">&nbsp;</div>
					<div class="form-group">
						<label>Message</label>
						<textarea class="form-control" rows="3" name="content" placeholder="can be your text here.."></textarea>
					</div>	
					<div class="form-group">
						<input type="hidden" name="to_id" value="<?php echo bin2hex($Users['User']['id']) ?>" />
						<a href="../../messages" class="btn btn-danger"> Cancel</a>
						<input type="submit" name="submit" value=" Send " class="btn btn-primary">
					</div>
				</form>
			</div>
			
	</div>
	<div class="col-sm-6 col-md-offset-3">&nbsp;</div>
	<div class="col-sm-6 col-md-offset-3">&nbsp;</div>
	<div class="col-sm-6 col-md-offset-3">&nbsp;</div>
</div>