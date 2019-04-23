<div class="col-sm-12 justify-content-md-center">					
	<div class="col-sm-6 col-md-offset-3">							
			<div class="col-sm-12">	
				<div class="col-sm-8 pdd-0">					
					<h2><b>Message Detail</b></h2>
				</div>							
			</div>

			<div class="col-sm-12">		
					<div class="form-group mrg-0">
						<label>To:</label>
						<span class="row">
							<?php
								$imguser = '../../img/' . $Users['User']['image'];
								if ($Users['User']['image'] == ''){
									$imguser = "../../img/D_users.jpe";
								}
								echo '&nbsp;&nbsp;&nbsp;&nbsp;<img src="'. $imguser .'" class="img-circle" width="25">&nbsp;&nbsp;' . $Users['User']['name'];
								echo $this->Html->link(
			                            'View Profile',
			                            '/users/viewuserprofile/' . $Users['User']['id'],
			                            array('class' => 'btn btn-md btn-primary pull-right', 'target' => '_blank')
			                        ); 
							?>
						</span>
					</div>

					<div class="form-group">
						<label>Message</label>
						<textarea class="form-control" rows="3" name="content" placeholder="can be your text here.."></textarea>
					</div>	
					<div class="form-group text-right">
						<input type="hidden" name="to_id" value="<?php echo bin2hex($Users['User']['id']) ?>" />
						<a href="../../messages" class="btn btn-danger"> Cancel</a>
						<input id="sendreply" type="submit" name="submit" value=" Reply " class="btn btn-primary">
						<h3 class="pull-left" style="margin:5px"> Coversation </h3>
					</div>

					<div class="form-group">
						<div class="col-md-12 convolist">							
							<br />
							<?php 
								foreach ($messages as $keymsg => $myconvo){
									if($sessionUserId == $myconvo['FromUser']['id']){
										$myconvo['FromUser']['image'] = ($myconvo['FromUser']['image'] == '') ? 'D_users.jpe' : $myconvo['FromUser']['image'];
										echo '<div id="rply'. bin2hex($myconvo['Message']['id']) .'" class="col-md-11 alert alert-info pull-right" role="alert">';
								  		echo '	<p>'. $myconvo['Message']['content'].'</p>';
										echo '  <hr class="ln-5">';
										echo '  <p class="mb-0 pull-right">';
										echo '<img src="../../img/'. $myconvo['FromUser']['image'] .'" width="25" class="img-circle">&nbsp;&nbsp; You - '. date('Y/m/d h:i:s a', strtotime($myconvo['Message']['created'])).' &nbsp;|&nbsp;<a href="javascript: void(0)" class="msgReply-remove" for="'. bin2hex($myconvo['Message']['id']) .'"> Delete </a></p>';
										echo '</div>';
									}else{
										$myconvo['FromUser']['image'] = ($myconvo['FromUser']['image'] == '') ? 'D_users.jpe' : $myconvo['FromUser']['image'];
										echo '<div class="col-md-11 alert alert-success pull-left" role="alert">';
								  		echo '	<p>'. $myconvo['Message']['content'].'</p>';
										echo '  <hr class="ln-5">';
										echo '  <p class="mb-0 pull-left">';
										echo '<img src="../../img/'. $myconvo['FromUser']['image'] .'" width="25" class="img-circle">&nbsp;&nbsp;'. $myconvo['FromUser']['name'] .' - '. date('Y/m/d h:i:s a', strtotime($myconvo['Message']['created'])).' </p>';
										echo '</div>';
									}
								}
							?>
						</div>
						<?php if($messageCount > $listCount): ?>
						<div class="col-md-12 text-center">
							<br />
							<form method ="post" action="../reply/<?php echo bin2hex($Users['User']['id']) ?>">									
								<button type="submit" class="msg-showmore" name="submit" value="<?php echo $listCount ?>"> Show More </button>
							</form>
							<br />
						</div>
						<?php endif; ?>
					</div>					
			</div>
			
	</div>
	<div class="col-sm-6 col-md-offset-3">&nbsp;</div>
	<div class="col-sm-6 col-md-offset-3">&nbsp;</div>
	<div class="col-sm-6 col-md-offset-3">&nbsp;</div>
</div>


<!-- Delete Modal HTML -->
<div id="deleteReplyModal" class="modal fade">
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
					<input type="submit" class="btn btn-danger delete-MessageReply" data-dismiss="modal" value="Delete" for="0">
				</div>
			</form>
		</div>
	</div>
</div>