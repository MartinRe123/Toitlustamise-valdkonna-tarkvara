<?=form_open(base_url()."index.php/my_account/change_password")?>

<table cellspacing='3' cellpadding='3'>

	<tr><td>
		Praegune parool <td><?=form_password(array("name"=>"cur_pw"))?>
		<td> <?=form_error("cur_pw") ?>
	</td></td>
	
	<tr><td>
		Uus parool <td><?=form_password(array("name"=>"new_pw"))?>
		<td> <?=form_error("new_pw") ?>
	</td></td>
	
	<tr><td>
		Korda uut parooli <td><?=form_password(array("name"=>"conf_pw"))?>
		<td> <?=form_error("conf_pw") ?>
	</td></td>

	<tr><td> <input type='submit' value='Kinnita' /></tr></td>
	
<table>

<?=form_close()?>