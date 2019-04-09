<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper('url');
?>
<div class="w3-bar">
  <a class="w3-bar-item w3-button w3-light-grey w3-hover-green" href ="<?php echo site_url("/"); ?>">Home</a>
  <div class="w3-dropdown-hover">
    <button class="w3-button w3-light-grey w3-hover-green">Benutzerverwaltung</button>
    <div class="w3-dropdown-content w3-bar-block w3-border w3-light-grey w3-hover-green  w3-card-4">
      <a href="<?php echo site_url("auth"); ?>" class="w3-bar-item w3-button w3-light-grey w3-hover-green">Benutzer</a>
      <a href="<?php echo site_url("auth/create_user"); ?>" class="w3-bar-item w3-button w3-light-grey w3-hover-green">Benutzer hinzufügen</a>
      <a href="<?php echo site_url("auth/create_group"); ?>" class="w3-bar-item w3-button w3-light-grey w3-hover-green">Gruppe hinzufügen</a>
      <a href="<?php echo site_url("auth/logout"); ?>" class="w3-bar-item w3-button w3-light-grey w3-hover-green">Logout</a>
    </div>
  </div>
</div>
