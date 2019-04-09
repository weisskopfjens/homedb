<body onload="document.getElementById('id01').style.display='block'">

<div class="w3-container w3-border">

<div id="id01" class="w3-modal"> <!-- modal open -->
  <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

<div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
  <h1><?php echo lang('login_heading');?></h1>
  <p><?php echo lang('login_subheading');?></p>

  <div id="infoMessage"><?php echo $message;?></div>
</div>

<?php echo form_open("auth/login",array('class' => 'w3-input'));?>

  <p>
    <?php echo lang('login_identity_label', 'identity');?>
    <?php echo form_input($identity,"",'class="w3-input w3-border"');?>
  </p>

  <p>
    <?php echo lang('login_password_label', 'password');?>
    <?php echo form_input($password,"",'class="w3-input w3-border"');?>
  </p>

  <p>
    <?php echo lang('login_remember_label', 'remember');?>
    <?php echo form_checkbox('remember', '1', FALSE, 'id="remember" class="w3-check"');?>
  </p>

  <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">

    <p><?php echo form_submit('submit', lang('login_submit_btn'),'class="w3-button w3-green"');?></p>
    <p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>
  </div>




<?php echo form_close();?>


  </div>
</div> <!-- modal close -->



</div>
