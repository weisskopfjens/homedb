<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper('url');
?>
<!DOCTYPE html>
<html lang="de">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('assets/apple-touch-icon.png');?>">
		<link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('assets/favicon-32x32.png');?>">
		<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/favicon-16x16.png');?>">
		<link rel="manifest" href="<?php echo base_url('assets/site.webmanifest');?>">

		<link href='<?php echo base_url('assets/w3-4.10/w3.css'); ?>' rel="stylesheet" type="text/css" />
		<script src='<?php echo base_url('assets/w3-4.10/w3.js'); ?>' type="text/javascript"></script>
		<script defer src='<?php echo base_url('assets/fontawesome-free-5.2.0-web/js/all.js');?>' ></script>
	</head>
	<body>
		<?php echo $content;?>
	</body>
</html>
