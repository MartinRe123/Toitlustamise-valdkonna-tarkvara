<script type="text/javascript" src="<?php echo base_url(); ?>js/date_picker_raport.js"></script>


<div class="content">
<h1><?php echo $this->lang->line("change_department"); ?></h1>
<form id="change_role_form" method="post" accept-charset="utf-8" action="/index.php/my_account/role_changed">

<label for="department"><?php echo $this->lang->line("department"); ?>: </label>
<select name="department" id="department">
<?php
	foreach($departments as $department){
		if(!empty($department['section_name'])){
			if($department['section_name'] == 'Lasteosakond'){
				echo '<option value="'.$department['section_name'].'">'.$this->lang->line("childrens_department").'</option>';
			}
			else if ($department['section_name'] == 'Kirurgia'){
				echo '<option value="'.$department['section_name'].'">'.$this->lang->line("surgery").'</option>';
			}
			else if ($department['section_name'] == 'Intensiivravi'){
				echo '<option value="'.$department['section_name'].'">'.$this->lang->line("intensive").'</option>';
			}
			else {
				echo '<option value="'.$department['section_name'].'">'.$department['section_name'].'</option>';
			}
		}
	}

?>
</select>

<input type="submit" value=<?php echo $this->lang->line("change"); ?>>
</form>
</div>
