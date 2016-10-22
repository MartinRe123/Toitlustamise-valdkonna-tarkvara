<div class="block">
<h1>REGAMISE LEHT</h1>
<a href="<?php echo base_url(); ?>">Esilehele</a>

<div class="form_validation_errors"> <?php echo validation_errors(); ?> </div>



<!-- REGISTERING FORM START -->
<form method="post" accept-charset="utf-8" action="/index.php/register/registrate">

<div class="form_account_info">
 
<label for="new_username">Kasutajanimi: </label>
<input type="text" id="new_username" name="new_username" value="<?php echo set_value('new_username'); ?>" />

<label for="new_password">Parool: </label>
<input type="password" id="new_password" name="new_password" />

<label for="new_password_again">Parool uuesti: </label>
<input type="password" id="new_password_again" name="new_password_again" />

<label for="new_email">E-mail: </label>
<input type="text" id="new_email" name="new_email" value="<?php echo set_value('new_email'); ?>" />

<label for="new_role">Roll: </label>
        <select id="new_role" name="new_role" onchange="sectionBox(this);">
                <option value="admin" selected="selected">Administraator</option>
                <option value="kokk">Kokk</option>
                <option value="osakond" >Osakond</option>
        </select>

<label for="section_box">Osakonna nimi: </label>
<input type="text" id="section_box" name="new_section" disabled />
<br/>

<button type="submit">Valmis</button>

<button type="reset" value="Reset">Eemalda kõik</button>

</form>

<!-- REGISTERING FORM END -->

</div>