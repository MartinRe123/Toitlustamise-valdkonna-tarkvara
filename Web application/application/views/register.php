<div class="block">
<h1><?php echo $this->lang->line("register"); ?></h1>

<div class="form_validation_errors"> <?php echo validation_errors(); ?> </div>



<!-- REGISTERING FORM START -->
<form method="post" accept-charset="utf-8" action="/index.php/register/registrate">

<div class="form_account_info">
 
<label for="new_username"><?php echo $this->lang->line("username"); ?>: </label>
<input type="text" id="new_username" name="new_username" value="<?php echo set_value('new_username'); ?>" />

<label for="new_password"><?php echo $this->lang->line("password"); ?>: </label>
<input type="password" id="new_password" name="new_password" />

<label for="new_password_again"><?php echo $this->lang->line("password_again"); ?>: </label>
<input type="password" id="new_password_again" name="new_password_again" />

<label for="new_email"><?php echo $this->lang->line("email"); ?>: </label>
<input type="text" id="new_email" name="new_email" value="<?php echo set_value('new_email'); ?>" />

<label for="new_role"><?php echo $this->lang->line("role"); ?>: </label>
        <select id="new_role" name="new_role" onchange="sectionBox(this);">
                <option value="admin" selected="selected"><?php echo $this->lang->line("admin"); ?></option>
                <option value="kokk"><?php echo $this->lang->line("chef"); ?></option>
                <option value="osakond" ><?php echo $this->lang->line("department"); ?></option>
        </select>

<label for="section_box"><?php echo $this->lang->line("department_name"); ?>: </label>
<input type="text" id="section_box" name="new_section" disabled />
<br/>

<button type="submit"><?php echo $this->lang->line("submit"); ?></button>

<button type="reset" value="Reset"><?php echo $this->lang->line("remove_all"); ?></button>

</form>

<!-- REGISTERING FORM END -->

</div>