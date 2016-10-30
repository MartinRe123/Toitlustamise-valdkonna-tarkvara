<div class="login">
<h1><?php echo $this->lang->line("login_page"); ?></h1>

<div class="notification"> <?php if(isset($notification_message)){ echo $notification_message; } ?> </div>



<div class="form_validation_errors"> <?php echo validation_errors(); ?> </div>



<!-- LOGIN FORM START -->
<form method="post" accept-charset="utf-8" action="/index.php/login/start">

<table cellspacing='3' cellpadding='3'>
<tr>
<th class="reglog"><label for="username"><?php echo $this->lang->line("username"); ?>: </label></th>
<td><input type="text" id="username" name="username" value="<?php echo set_value('username'); ?>" /></td>
</tr>
<tr>
<th class="reglog"><label for="password"><?php echo $this->lang->line("password"); ?>: </label></th>
<td><input type="password" id="password" name="password" /></td>
</tr>
</table>
<button type="submit"><?php echo $this->lang->line("login"); ?></button>

</form>

<!-- LOGIN FORM END -->
</div>