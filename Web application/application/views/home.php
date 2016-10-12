<div class="block">



<h1><?php echo $this->lang->line("page_content"); ?></h1>

<div class="notification"> <?php if(isset($notification_message)){ echo $notification_message; } ?> </div>

<a href="<?php echo base_url(); ?>index.php/register"><?php echo $this->lang->line("register"); ?></a> 
<a href="<?php echo base_url(); ?>index.php/login"><?php echo $this->lang->line("login"); ?></a>
<a href="<?php echo base_url(); ?>index.php/kitchen_menu"><?php echo $this->lang->line("kitchen_menus"); ?></a>


<br/>







</div>