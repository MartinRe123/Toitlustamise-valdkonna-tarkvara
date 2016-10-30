<div class="content">

<h1><?php echo $this->lang->line("change_password"); ?></h1>
<?=form_open(base_url()."index.php/my_account/change_password")?>

<table cellspacing='3' cellpadding='3'>

	<tr>
	<th class="reglog">Praegune parool: </th>
	<td><?=form_password(array("name"=>"cur_pw"))?>
		<td> <?=form_error("cur_pw") ?>
	</td></td>
	</tr>	
	<tr>
	<th class="reglog">Uus parool: </th>
	<td><?=form_password(array("name"=>"new_pw"))?>
		<td> <?=form_error("new_pw") ?>
	</td></td>
	</tr>	
	<tr>
	<th class="reglog">Korda uut parooli: </th>
	<td><?=form_password(array("name"=>"conf_pw"))?>
		<td> <?=form_error("conf_pw") ?>
	</td></td>
	</tr>
	<tr>
	<td></td>
	<td><input type='submit' value='Kinnita' />
	</tr>
	
</table>

<?=form_close()?>