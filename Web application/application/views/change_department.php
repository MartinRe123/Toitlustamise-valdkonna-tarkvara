<script type="text/javascript" src="<?php echo base_url(); ?>js/date_picker_raport.js"></script>


<div class="content">
<h1>Vaheta esindatavat osakonda</h1>
<form id="change_role_form" method="post" accept-charset="utf-8" action="/index.php/my_account/role_changed">

<label for="department">Osakond: </label>
<select name="department" id="department">
<?php
	foreach($departments as $department){
		if(!empty($department['section_name'])){
			echo '<option value="'.$department['section_name'].'">'.$department['section_name'].'</option>';
		}
	}
?>
</select>

<input type="submit" value="Vaheta">
</form>
</div>
