<!DOCTYPE html>
<html lang="en" xml:lang="en">


        <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Rakendus</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>styles/style.css">
		<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

<script type="text/javascript" src="<?php echo base_url(); ?>js/section_menu_functions.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/kitchen_menu_functions.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/registration_functions.js"></script>



</head>
<body>

<div class="sidebar">  
<br> 
<br>          
<?php 
if ($this->session->userdata('role') == 'kokk'){
	echo '<h1>'.$this->lang->line("chef").'</h1>';
}else if($this->session->userdata('role') == 'osakond'){
	echo '<h1>'.$this->lang->line("department").'</h1>';
	echo '<h2>'.$this->session->userdata('section').'</h2>';
}else if($this->session->userdata('role') == 'admin'){
	echo '<h1>'.$this->lang->line("admin").'</h1>';
}
?>   
<br>
<br>
<table id="sidebar_table" >
  <tr>
   <?php if($this->session->userdata('logged_in')){
		echo '<td class="td_"><a class="sidebar_a" href="'.base_url().'index.php/kitchen_menu">'.$this->lang->line("kitchen_menus").'</a></td>';
   }
   ?>
  </tr>
   <?php if($this->session->userdata('logged_in') && ($this->session->userdata('role') == 'kokk' || $this->session->userdata('role') == 'admin')){
		echo '<tr><td class="td_"><a class="sidebar_a" href="'.base_url().'index.php/kitchen_menu/create">'.$this->lang->line("add_menu").'</a></td></tr>';
   }
   ?>
  <tr>
   <?php if($this->session->userdata('logged_in')){
		echo '<td class="td_"><a class="sidebar_a" href="'.base_url().'">'.$this->lang->line("raports").'</a></td>';
   }
   ?>
  </tr>
  <tr>
   <?php if($this->session->userdata('logged_in')){
		echo '    <td class="td_"><a class="sidebar_a" href="'.base_url().'">'.$this->lang->line("archive").'</a></td>';
   }
   ?>
  </tr>
  <tr>
   <?php if($this->session->userdata('logged_in')){
		echo '<td class="td_"><a class="sidebar_a" href="'.base_url().'">'.$this->lang->line("chat").'</a></td>';
   }
   ?>
  </tr>
   <tr>
   <?php if($this->session->userdata('logged_in') && $this->session->userdata('role') == 'admin'){
		echo '<td class="td_"><a class="sidebar_a" href="'.base_url().'index.php/register">'.$this->lang->line("register").'</a></td>';
   }
   ?>
  </tr>
  <tr>
   <?php if($this->session->userdata('logged_in')){
		echo '<td class="td_"><a class="sidebar_a" href="'.base_url().'index.php/my_account/change_password">'.$this->lang->line("change_password").'</a></td>';
   }
   ?>
  </tr>
   <tr>
   <?php if($this->session->userdata('logged_in')){
		echo '<td class="td_"><a class="sidebar_a" href="'.base_url().'index.php/about">'.$this->lang->line("about_page").'</a></td>';
   }
   ?>
  </tr>
</table>



 

</div>