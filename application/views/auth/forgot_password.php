<div class="w3-container w3-border">


<h1><?php echo lang('forgot_password_heading');?></h1>
<p><?php echo sprintf(lang('forgot_password_subheading'), $identity_label);?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/forgot_password",array('class' => 'w3-input'));?>

      <p>
      	<label for="identity"><?php echo (($type=='email') ? sprintf(lang('forgot_password_email_label'), $identity_label) : sprintf(lang('forgot_password_identity_label'), $identity_label));?></label> <br />
      	<?php echo form_input($identity,"",'class="w3-input"');?>
      </p>

      <p><?php echo form_submit('submit', lang('forgot_password_submit_btn'),'class="w3-button w3-green"');?></p>

<?php echo form_close();?>

</div>
