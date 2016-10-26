<div class="block">



<h1><?php echo $this->lang->line("page_content"); ?></h1>

<div class="notification"> <?php if(isset($notification_message)){ echo $notification_message; } ?> </div>

<a href="<?php echo base_url(); ?>index.php/register">Regamine</a> 
<a href="<?php echo base_url(); ?>index.php/login">Sisse logimine</a>
<a href="<?php echo base_url(); ?>index.php/kitchen_menu">Tellimus</a>
<a href="<?php echo base_url(); ?>index.php/kitchen_menu/create">Lisa uus menüü</a>


<br/>







</div>