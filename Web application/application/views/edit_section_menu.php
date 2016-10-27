<?php echo '<h1>'.$section_name.' menüü kuupäeval '.$date.'</h1>';?>
</br>
<a href="<?php base_url() ?>/index.php/kitchen_menu">Tagasi menüüde lehele</a>

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
    echo 'Hoia hiirekursorit toidu nimetusel, et näha lisainfot.';
    echo '<form method="post" accept-charset="utf-8" action="/index.php/section_menu/save_menu_edit/'.$date.'"><table>';
    echo '<tr><td>Hommikusöök</td><td>Lõunasöök</td><td>Õhtusöök</td></tr>';
    
	for ($i = 0; $i < $max_rows; $i++){
        echo '<tr>';
        if(!empty($breakfast_array[$i])){
			$food_name = explode('=', $breakfast_array[$i])[0];
			$food_info = explode('=', $breakfast_array[$i])[1];
            echo '	<td>
					<input type="checkbox" id="b_'.$i.'" name="breakfast[]" value="'. $food_name . "=" . $food_info .'" onclick="showTextbox(this);">
					<span title="'. $food_info .'">'. $food_name .'</span>
					<div id="b_'. $food_name . '_count[]"></div>
					</td>'; 
        }
        if(!empty($lunch_array[$i])){
			$food_name = explode('=', $lunch_array[$i])[0];
			$food_info = explode('=', $lunch_array[$i])[1];
			echo '	<td>
					<input type="checkbox" id="l_'.$i.'" name="lunch[]" value="'. $food_name . "=" . $food_info .'" onclick="showTextbox(this);">
					<span title="'. $food_info .'">'. $food_name .'</span>
					<div id="l_'. $food_name . '_count[]"></div>
					</td>';
        }
        if(!empty($supper_array[$i])){
			$food_name = explode('=', $supper_array[$i])[0];
			$food_info = explode('=', $supper_array[$i])[1];
			echo '	<td>
					<input type="checkbox" id="s_'.$i.'" name="supper[]" value="'. $food_name . "=" . $food_info .'" onclick="showTextbox(this);">
					<span title="'. $food_info .'">'. $food_name .'</span>
					<div id="s_'. $food_name . '_count[]"></div>
					</td>';
        }
        echo '</tr>';
    }
    echo '</table><br/><p>Lisamärkused:</p>';
	echo '<textarea name="comments" rows="4" cols="50">'.$comments.'</textarea><br/>';
	echo '<input type="submit" value="Salvesta muudatus" onclick="addAllCount();"></form>';
	
	echo '<script type="text/javascript"> fillSelected("'.$order_breakfast.'", "'.$order_lunch.'", "'.$order_supper.'"); </script>';
}
?>