<div class="w3-container w3-border">


<h1><?php echo lang('reset_password_heading');?></h1>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open('auth/reset_password/' . $code,array('class' => 'w3-input'));?>

	<p>
		<label for="new_password"><?php echo sprintf(lang('reset_password_new_password_label'), $min_password_length);?></label> <br />
		<?php echo form_input($new_password,"",'class="w3-input"');?>
	</p>

	<p>
		<?php echo lang('reset_password_new_password_confirm_label', 'new_password_confirm');?> <br />
		<?php echo form_input($new_password_confirm,"",'class="w3-input"');?>
	</p>

	<?php echo form_input($user_id,"",'class="w3-input"');?>
	<?php echo form_hidden($csrf); ?>

	<p><?php echo form_submit('submit', lang('reset_password_submit_btn'),'class="w3-button w3-green"');?></p>

<?php echo form_close();?>

</div>
