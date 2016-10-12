<?php echo '<h1> Osakonna menüü kuupäeval '.$date.'</h1>';?>
</br>
<a href="<?php base_url() ?>/index.php/kitchen_menu">Tagasi menüüde lehele</a>

<?php 

    $array_order = $order[0];
	$array_kitchen_menu = $kitchen[0];
	
	$breakfast_array = explode(';', $array_kitchen_menu['breakfast']);
    $lunch_array = explode(';', $array_kitchen_menu['lunch']);
    $supper_array = explode(';', $array_kitchen_menu['supper']);
	
	$breakfast_info_array = explode(';', $array_kitchen_menu['breakfast_info']);
    $lunch_info_array = explode(';', $array_kitchen_menu['lunch_info']);
    $supper_info_array = explode(';', $array_kitchen_menu['supper_info']);
	
	$b_i = 0;
	$l_i = 0;
	$s_i = 0;
	
	for ($i = 0; $i < count($breakfast_array); $i++){
		if($array_order['breakfast'] == $breakfast_array[$i]){
			$b_i = $i;
			break;
		}
	}
	
	for ($i = 0; $i < count($lunch_array); $i++){
		if($array_order['lunch'] == $lunch_array[$i]){
			$l_i = $i;
			break;
		}
	}
	
	for ($i = 0; $i < count($supper_array); $i++){
		if($array_order['supper'] == $supper_array[$i]){
			$s_i = $i;
			break;
		}
	}
	
	echo '<table>
	<tr><td>Hommikusöök</td><td>Lõunasöök</td><td>Õhtusöök</td></tr>
	<tr><td><span title="'.$breakfast_info_array[$b_i].'">'.$array_order['breakfast'].'</span></td>
	<td><span title="'.$lunch_info_array[$l_i].'">'.$array_order['lunch'].'</span></td>
	<td><span title="'.$supper_info_array[$s_i].'">'.$array_order['supper'].'</span></td></tr>
	</table>';
?>


<a href="<?php base_url() ?>/index.php/section_menu/edit/<?php echo $date ?>">Muuda menüüd</a>
