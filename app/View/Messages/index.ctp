 <div class="col-sm-12 justify-content-md-center">					
	<div class="col-sm-6 col-md-offset-3">			
		<div class="col-sm-12">	
			<div class="col-sm-8 pdd-0">					
				<h2><b>Message List</b></h2>
			</div>	
			<div class="col-sm-4 text-right pdd-15-t pdd-0-lr">
				<a href="messages/new" class="btn btn-primary"><span>New Message</span></a>
			</div>							
		</div>
		<div class="col-sm-12">						
			<div class="col-sm-12 pdd-0 list-group">	
				<?php 
					foreach($message as $messagelist => $mymessage):
						$msgbin2hex =  bin2hex($mymessage['Message']['id'] .'|'. $mymessage['Message']['to_id'] .'|'. $mymessage['Message']['from_id']);
				?>

				<div id="ct<?php  echo $msgbin2hex ?>" class="list-group-item message">
					<div class="row">											
						<div class="col-sm-2 crs-pointer viewconvo" data-account = "<?php echo bin2hex($mymessage[$mymessage['userReflect']]['id'])?>">
							<?php if($mymessage[$mymessage['userReflect']]['image'] != ''):
								echo $this->Html->image($mymessage[$mymessage['userReflect']]['image'], array("alt" => "alternative_text", "class" => "img-responsive", "id" => "output"));
							else: ?>
								<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTGSlfCyewmhkjDINdHMeYnEhwqbcBRS_UBzqxUOuM94aLTYJ5b" class="img-responsive" alt="Cinque Terre">
							<?php endif; ?>
						</div>
						<div class="col-sm-10">
							<p class="col-sm-12 pdd-0 text-justify crs-pointer viewconvo" data-account = "<?php echo bin2hex($mymessage[$mymessage['userReflect']]['id'])?>">
								<?php echo (strlen($mymessage['Message']['content']) < 100) ? $mymessage['Message']['content'] : substr($mymessage['Message']['content'], 0, 100) .'...' ;?>
							</p>

							<span class="col-sm-12 text-right bdr-1-t">
								<small>
									<?php echo $mymessage[$mymessage['userReflect']]['name'] .' '. date('Y/m/d h:i:s a', strtotime($mymessage['Message']['created']))?>															
								</small>
								&nbsp;|&nbsp;<a href="javascript: void(0)" class="msg-remove" for="<?php  echo $msgbin2hex ?>"> Delete </a>
							</span>
						</div>
					</div>
				</div>	
				<?php endforeach; ?>	
			</div>
		</div>
		<?php if($listCount < $messageCount): ?>
		<div class="col-sm-12 text-center">	
			<form method ="post" action="messages">									
				<button type="submit" class="msg-showmore" name="submit" value="<?php echo $listCount ?>"> Show More </button>
			</form>
		</div>
		<?php endif; ?>
			
	</div>
	<div class="col-sm-6 col-md-offset-3">&nbsp;</div>
	<div class="col-sm-6 col-md-offset-3">&nbsp;</div>
	<div class="col-sm-6 col-md-offset-3">&nbsp;</div>
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