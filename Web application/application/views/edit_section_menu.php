<?php echo '<h1> Osakonna menüü kuupäeval '.$date.'</h1>';?>
</br>
<a href="<?php base_url() ?>/index.php/kitchen_menu">Tagasi menüüde lehele</a>

<?php
if(!empty($menu)){
	$order_array = $order[0];
	$order_breakfast = $order_array['breakfast'];
	$order_lunch = $order_array['lunch'];
	$order_supper = $order_array['supper'];
	
    $array = $menu[0];
    $breakfast_array = explode(';', $array['breakfast']);
    $lunch_array = explode(';', $array['lunch']);
    $supper_array = explode(';', $array['supper']);
    $breakfast_info = explode(';', $array['breakfast_info']);
    $lunch_info = explode(';', $array['lunch_info']);
    $supper_info = explode(';', $array['supper_info']);


    $max_rows = max(count($breakfast_array), count($lunch_array), count($supper_array));
    echo 'Hoia hiirekursorit toidu nimetusel, et näha lisainfot.';
    echo '<form method="post" accept-charset="utf-8" action="/index.php/section_menu/save_menu_edit/'.$date.'"><table>';
    echo '<tr><td>Hommikusöök</td><td>Lõunasöök</td><td>Õhtusöök</td></tr>';
    for ($i = 0; $i < $max_rows; $i++){
        echo '<tr>';
        if(!empty($breakfast_array[$i])){
            echo '<td><input type="radio" name="breakfast" value="'. $breakfast_array[$i] .'"';
			if($breakfast_array[$i] == $order_breakfast){
				echo ' checked="checked"';
			}
			echo '><span title="'.$breakfast_info[$i].'">'.$breakfast_array[$i].'</span></td>'; 
        }
        if(!empty($lunch_array[$i])){
			echo '<td><input type="radio" name="lunch" value="'. $lunch_array[$i] .'"';
			if($lunch_array[$i] == $order_lunch){
				echo ' checked="checked"';
			}
            echo '><span title="'.$lunch_info[$i].'">'.$lunch_array[$i].'</span></td>';
        }
        if(!empty($supper_array[$i])){
			echo '<td><input type="radio" name="supper" value="'. $supper_array[$i] .'"';
			if($supper_array[$i] == $order_supper){
				echo ' checked="checked"';
			}
            echo '><span title="'.$supper_info[$i].'">'.$supper_array[$i].'</span></td>';
        }
        echo '</tr>';
    }
    echo '</table><input type="submit" value="Muuda"></form>';
}
?>