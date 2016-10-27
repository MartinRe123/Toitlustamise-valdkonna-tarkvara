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
<h1>OSAKOND</h1>
<br>
<br>
<table id="sidebar_table" >
  <tr>
    <td class="td_"><a class="sidebar_a" href="<?php echo base_url(); ?>index.php/kitchen_menu"><?php echo $this->lang->line("kitchen_menus"); ?></a></td>
  </tr>
   <tr>
    <td class="td_"><a class="sidebar_a" href="<?php echo base_url() ?>index.php/kitchen_menu/create"><?php echo $this->lang->line("add_menu"); ?></a></td>
  </tr>
  <tr>
    <td class="td_"><a class="sidebar_a" href="<?php base_url() ?>"><?php echo $this->lang->line("raports"); ?></a></td>
  </tr>
  <tr>
    <td class="td_"><a class="sidebar_a" href="<?php base_url() ?>"><?php echo $this->lang->line("archive"); ?></a></td>
  </tr>
  <tr>
    <td class="td_"><a class="sidebar_a" href="<?php base_url() ?>"><?php echo $this->lang->line("chat"); ?></a></td>
  </tr>
   <tr>
    <td class="td_"><a class="sidebar_a" href="<?php echo base_url() ?>index.php/register"><?php echo $this->lang->line("register"); ?></a></td>
  </tr>
  <tr>
    <td class="td_"><a class="sidebar_a" href="<?php base_url() ?>"><?php echo $this->lang->line("change_password"); ?></a></td>
  </tr>
   <tr>
    <td class="td_"><a class="sidebar_a" href="<?php base_url() ?>/index.php/about"><?php echo $this->lang->line("about_page"); ?></a></td>
  </tr>
</table>



 

</div>