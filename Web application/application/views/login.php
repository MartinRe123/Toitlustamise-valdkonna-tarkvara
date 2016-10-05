<h1>Login leht</h1>

<div class="notification"> <?php if(isset($notification_message)){ echo $notification_message; } ?> </div>

<a href="<?php echo base_url(); ?>">Esileht</a>
<a href="<?php echo base_url(); ?>index.php/register">Regamine</a>


<div class="form_validation_errors"> <?php echo validation_errors(); ?> </div>



<!-- LOGIN FORM START -->
<form method="post" accept-charset="utf-8" action="/index.php/login/start">

 
<label for="username">Kasutajanimi: </label>
<input type="text" id="username" name="username" value="<?php echo set_value('username'); ?>" />

<label for="password">Parool: </label>
<input type="password" id="password" name="password" />

<button type="submit">Logi sisse</button>

</form>

<!-- LOGIN FORM END -->