<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Message Board</title>
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
                        <?php
                            echo $this->Html->link(
                                'Logout',
                                '/users/logout',
                                array('class' => 'btn btn-md btn-danger', 'target' => '')
                            );

                            echo $this->Html->link(
                                'Messages',
                                '/messages',
                                array('class' => 'btn btn-md btn-success', 'target' => '')
                            );

                            echo $this->Html->link(
                                'Profile',
                                '/users/profile',
                                array('class' => 'btn btn-md btn-success', 'target' => '')
                            );
                        ?>
					</div>
                </div>
            </div>         	
         	<div class="row">
         		<?php echo $this->Flash->render(); ?>
				<?php echo $this->fetch('content'); ?>
            </div>
        </div>
    </div>
</body>
</html> 