<div class="w3-container w3-border">


<h1><?php echo lang('edit_group_heading');?></h1>
<p><?php echo lang('edit_group_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open(current_url(),array('class' => 'w3-input'));?>

      <p>
            <?php echo lang('edit_group_name_label', 'group_name');?> <br />
            <?php echo form_input($group_name,"",'class="w3-input"');?>
      </p>

      <p>
            <?php echo lang('edit_group_desc_label', 'description');?> <br />
            <?php echo form_input($group_description,"",'class="w3-input"');?>
      </p>

      <p><?php echo form_submit('submit', lang('edit_group_submit_btn'),'class="w3-button w3-green"');?></p>

<?php echo form_close();?>

</div>
