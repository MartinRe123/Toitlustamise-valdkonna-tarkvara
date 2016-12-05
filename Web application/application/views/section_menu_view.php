<div class="content">

<?php
if ($section_name == 'Kirurgia'){
	echo '<h1>'.$this->lang->line("surgery").' '.$this->lang->line("menu_on_date").' '.$date.'</h1>';
}
else if ($section_name == 'Lasteosakond'){
	echo '<h1>'.$this->lang->line("childrens_department").' '.$this->lang->line("menu_on_date").' '.$date.'</h1>';
}
else if ($section_name == 'Intensiivravi'){
	echo '<h1>'.$this->lang->line("intensive").' '.$this->lang->line("menu_on_date").' '.$date.'</h1>';
}

else {
 echo '<h1>'.$section_name.' '.$this->lang->line("menu_on_date").' '.$date.'</h1>';
 }

?>

</br>
<a id="lingid" href="<?php base_url() ?>/index.php/kitchen_menu"><?php echo $this->lang->line("back_to_menu"); ?></a>
<br><br>
<?php 

    $array_order = $order[0];	
	
	$comments = $array_order['comments'];
	$breakfast_array = array();
	$lunch_array = array();
	$supper_array = array();
	
	if(!empty($array_order['breakfast'])){
		$breakfast_array = explode(';', $array_order['breakfast']);
	}
	if(!empty($array_order['lunch'])){
		$lunch_array = explode(';', $array_order['lunch']);
	}
	if(!empty($array_order['supper'])){
	    $supper_array = explode(';', $array_order['supper']);
	}
	
	$max_rows = max(count($breakfast_array), count($lunch_array), count($supper_array));
	echo '<table class="section_menu_view"><tr><th>'.$this->lang->line("breakfast").'</th><th>'.$this->lang->line("lunch").'</th><th>'.$this->lang->line("dinner").'</th></tr><tr>';
	for ($i = 0; $i < $max_rows; $i++){
		echo '<tr>';
		if($i < count($breakfast_array)){
			$b_inf = explode("=", $breakfast_array[$i]);
			echo '<td class="section_menu_view"><span title="'.str_replace("|","\n",$b_inf[1]).'">'.$b_inf[0].'</span> ('.$b_inf[2].' '.$this->lang->line("portion").')</td>';
		}else{
			echo '<td></td>';
		}
		if($i < count($lunch_array)){
			$l_inf = explode("=", $lunch_array[$i]);
			echo '<td class="section_menu_view"><span title="'.str_replace("|","\n",$l_inf[1]).'">'.$l_inf[0].'</span> ('.$l_inf[2].' '.$this->lang->line("portion").')</td>';
		}else{
			echo '<td></td>';
		}
		if($i < count($supper_array)){
			$s_inf = explode("=", $supper_array[$i]);
			echo '<td class="section_menu_view"><span title="'.str_replace("|","\n",$s_inf[1]).'">'.$s_inf[0].'</span> ('.$s_inf[2].' '.$this->lang->line("portion").')</td>';
		}else{
			echo '<td></td>';
		}
		echo '</tr>';
	}
	echo '</table>';
	echo '<b><p>'.$this->lang->line("comments").':</p></b>';
	echo '<textarea name="comments" rows="4" cols="50" disabled>'.$comments.'</textarea><br/>';
	
?>

<br>
<a id="lingid" href="<?php base_url() ?>/index.php/section_menu/edit/<?php echo $date ?>"><?php echo $this->lang->line("change_order"); ?></a>
<a id="lingid" onclick="deleteConfirmation(this, '<?php base_url() ?>/index.php/section_menu/delete/<?php echo $date; ?>');" href=""><?php echo $this->lang->line("delete_order"); ?></a>
