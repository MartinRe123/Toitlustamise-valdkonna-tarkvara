<!DOCTYPE html>
<html lang="en" xml:lang="en">


        <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Rakendus</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>styles/style.css">
		

<script type="text/javascript" src="<?php echo base_url(); ?>js/section_menu_functions.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/kitchen_menu_functions.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/registration_functions.js"></script>


        </head>
        <body>
<div class="header">
<h1><a href="<?php echo base_url(); ?>">Esilehele</a></h1>

<td><a href='<?php echo base_url(); ?>index.php/langswitch/switchLanguage/english'>English</a></td>
<td><a href='<?php echo base_url(); ?>index.php/langswitch/switchLanguage/estonian'>Estonian</a></td>
<td><a href='<?php echo base_url(); ?>index.php/langswitch/switchLanguage/russian'>Russian</a></td>

<?php         	
if($this->session->userdata('logged_in')){
     	$session_data = $this->session->userdata('username');
     	echo 'Oled sisse loginud kasutajaga <b>'.$session_data.'</b>';
        echo '<br/><a href="'.base_url().'index.php/login/logout">Logi välja</a>';
 } ?>

</div>
<div class="content">




