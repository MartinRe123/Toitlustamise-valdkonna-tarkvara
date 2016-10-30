<div class="content">
<div class="block">
<h1><?php echo $this->lang->line("register"); ?></h1>

<div class="form_validation_errors"> <?php echo validation_errors(); ?> </div>



<!-- REGISTERING FORM START -->
<form method="post" accept-charset="utf-8" action="/index.php/register/registrate">

<div class="form_account_info">
<table cellspacing='3' cellpadding='3'>
<tr>
<th class="reglog"><label for="new_username"><?php echo $this->lang->line("username"); ?>: </label></th>
<td><input type="text" id="new_username" name="new_username" value="<?php echo set_value('new_username'); ?>" /></td>
</tr>
<tr>
<th class="reglog"><label for="new_password"><?php echo $this->lang->line("password"); ?>: </label></th>
<td><input type="password" id="new_password" name="new_password" /><td>
</tr>
<tr>
<th class="reglog"><label for="new_password_again"><?php echo $this->lang->line("password_again"); ?>: </label></th>
<td><input type="password" id="new_password_again" name="new_password_again" /></td>
</tr>
</tr>
<th class="reglog"><label for="new_email"><?php echo $this->lang->line("email"); ?>: </label</th>
<td><input type="text" id="new_email" name="new_email" value="<?php echo set_value('new_email'); ?>" /></td>
</tr>
<tr>
<th class="reglog"><label for="new_role"><?php echo $this->lang->line("role"); ?>: </label></th>
        <td><select id="new_role" name="new_role" onchange="sectionBox(this);">
                <option value="admin" selected="selected"><?php echo $this->lang->line("admin"); ?></option>
                <option value="kokk"><?php echo $this->lang->line("chef"); ?></option>
                <option value="osakond" ><?php echo $this->lang->line("department"); ?></option>
        </select></td>
</tr>
<tr>
<th class="reglog"><label for="section_box"><?php echo $this->lang->line("department_name"); ?>: </label></th>
<td><input type="text" id="section_box" name="new_section" disabled /></td>
</tr>
<tr>
<th class="reglog"><button type="submit"><?php echo $this->lang->line("submit"); ?></button></th>
<td><button type="reset" value="Reset"><?php echo $this->lang->line("remove_all"); ?></button></td>
</table>

</form>

<!-- REGISTERING FORM END -->

</div>