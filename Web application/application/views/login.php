<h1><?php echo $this->lang->line("login_page"); ?></h1>

<div class="notification"> <?php if(isset($notification_message)){ echo $notification_message; } ?> </div>

<a href="<?php echo base_url(); ?>"><?php echo $this->lang->line("front_page"); ?></a>
<a href="<?php echo base_url(); ?>index.php/register"><?php echo $this->lang->line("register"); ?></a>
<p>Admin kasutaja on testtest, parool sama</p>

<div class="form_validation_errors"> <?php echo validation_errors(); ?> </div>



<!-- LOGIN FORM START -->
<form method="post" accept-charset="utf-8" action="/index.php/login/start">

 
<label for="username"><?php echo $this->lang->line("username"); ?>: </label>
<input type="text" id="username" name="username" value="<?php echo set_value('username'); ?>" />

<label for="password"><?php echo $this->lang->line("password"); ?>: </label>
<input type="password" id="password" name="password" />

<button type="submit"><?php echo $this->lang->line("login"); ?></button>

</form>

<!-- LOGIN FORM END -->