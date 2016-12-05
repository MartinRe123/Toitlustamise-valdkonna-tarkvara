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
if(!empty($menu)){
	$order_array = $order[0];
	$order_breakfast = $order_array['breakfast'];
	$order_lunch = $order_array['lunch'];
	$order_supper = $order_array['supper'];
	$comments = $order_array['comments'];
		
	
	$array = $menu[0];
    $breakfast_array = explode(';', $array['breakfast']);
    $lunch_array = explode(';', $array['lunch']);
    $supper_array = explode(';', $array['supper']);
	
    $max_rows = max(count($breakfast_array), count($lunch_array), count($supper_array));
    echo '<b>'.$this->lang->line("hover_cursor").'.</b><br><br>';
    echo '<form onsubmit="return addAllCount(\''.$this->lang->line("order_notification").'\', \''.$this->lang->line("order_notification2").'\');" method="post" accept-charset="utf-8" action="/index.php/section_menu/save_menu_edit/'.$date.'"><table class="section_menu_view">';
    echo '<tr><th>'.$this->lang->line("breakfast").'</th><th>'.$this->lang->line("lunch").'</th><th>'.$this->lang->line("dinner").'</th></tr>';
    
	for ($i = 0; $i < $max_rows; $i++){
        echo '<tr>';
        if(!empty($breakfast_array[$i])){
			$food_name = explode('=', $breakfast_array[$i])[0];
			$food_info = explode('=', $breakfast_array[$i])[1];
            echo '	<td class="section_menu_view">
					<input type="checkbox" id="b_'.$i.'" name="breakfast[]" value="'. $food_name . "=" . $food_info .'" onclick="showTextbox(this);">
					<span title="'. str_replace("|","\n",$food_info) .'">'. $food_name .'</span>
					<div id="b_'. $food_name . '_count[]"></div>
					</td>'; 
        }
        if(!empty($lunch_array[$i])){
			$food_name = explode('=', $lunch_array[$i])[0];
			$food_info = explode('=', $lunch_array[$i])[1];
			echo '	<td class="section_menu_view">
					<input type="checkbox" id="l_'.$i.'" name="lunch[]" value="'. $food_name . "=" . $food_info .'" onclick="showTextbox(this);">
					<span title="'. str_replace("|","\n",$food_info) .'">'. $food_name .'</span>
					<div id="l_'. $food_name . '_count[]"></div>
					</td>';
        }
        if(!empty($supper_array[$i])){
			$food_name = explode('=', $supper_array[$i])[0];
			$food_info = explode('=', $supper_array[$i])[1];
			echo '	<td class="section_menu_view">
					<input type="checkbox" id="s_'.$i.'" name="supper[]" value="'. $food_name . "=" . $food_info .'" onclick="showTextbox(this);">
					<span title="'. str_replace("|","\n",$food_info) .'">'. $food_name .'</span>
					<div id="s_'. $food_name . '_count[]"></div>
					</td>';
        }
        echo '</tr>';
    }
    echo '</table><b><p>'.$this->lang->line("comments").':</p></b>';
	echo '<textarea name="comments" rows="4" cols="50">'.$comments.'</textarea><br/>';
	echo '<input type="submit" value="'.$this->lang->line("save").'"></form>';
	
	echo '<script type="text/javascript"> fillSelected("'.$order_breakfast.'", "'.$order_lunch.'", "'.$order_supper.'"); </script>';
}
?>