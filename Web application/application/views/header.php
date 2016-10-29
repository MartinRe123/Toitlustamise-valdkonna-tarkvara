<!DOCTYPE html>
<html lang="en" xml:lang="en">


        <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Valga</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>styles/style.css">
		<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

<script type="text/javascript" src="<?php echo base_url(); ?>js/section_menu_functions.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/kitchen_menu_functions.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/registration_functions.js"></script>



</head>

<body>

<div class="header">
<table width="100%">
<tr>
<td id="rolls"><?php 
if ($this->session->userdata('role') == 'kokk'){
	echo '<h2 class="roll">'.$this->lang->line("chef").'</h2>';
}else if($this->session->userdata('role') == 'osakond'){
	echo '<h2 class="roll">'.$this->lang->line("department").': '.$this->session->userdata('section').'</h2>';
}else if($this->session->userdata('role') == 'admin'){
	echo '<h2 class="roll">'.$this->lang->line("admin").'</h2>';
}
?></td>
<td><a id="logo" href="<?php echo base_url(); ?>index.php/home"><img src="/images/haigla_logo.png"></a></td>
<td>
<table id="langs" >
<tr>
<td><a href='<?php echo base_url(); ?>index.php/langswitch/switchLanguage/estonian'><img src="/images/estonian.png" width="30" height="16" border="0"></a></td>
<td><a href='<?php echo base_url(); ?>index.php/langswitch/switchLanguage/english'><img src="/images/english.png" width="30" height="16" border="0"></a></td>
<td><a href='<?php echo base_url(); ?>index.php/langswitch/switchLanguage/russian'><img src="/images/russian.png" width="30" height="16" border="0"></a></td>
</tr>
</table>
<br><br>
<p id="logindata">
<?php         	
if($this->session->userdata('logged_in')){
     	$session_data = $this->session->userdata('username');
     	echo 'Oled sisse loginud kasutajaga <b>'.$session_data.'</b>';
        echo '<br/><br><a id ="logivalja" href="'.base_url().'index.php/login/logout">Logi välja</a>';
 } ?>
</p></td>
</tr>
</table>
</div>

<div class="content">




