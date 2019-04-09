<div class="w3-container w3-border">


<h1><?php echo lang('create_group_heading');?></h1>
<p><?php echo lang('create_group_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/create_group",array('class' => 'w3-input'));?>

      <p>
            <?php echo lang('create_group_name_label', 'group_name');?> <br />
            <?php echo form_input($group_name,"",'class="w3-input"');?>
      </p>

      <p>
            <?php echo lang('create_group_desc_label', 'description');?> <br />
            <?php echo form_input($description,"",'class="w3-input"');?>
      </p>

      <p><?php echo form_submit('submit', lang('create_group_submit_btn'),'class="w3-button w3-green"');?></p>

<?php echo form_close();?>

</div>
