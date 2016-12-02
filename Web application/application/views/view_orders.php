<div class="content">
<?php 
	echo '<h1>'.$date.'</h1>';
	echo '<a href="'.base_url().'index.php/kitchen_menu">Tagasi eelmisele lehele</a>';

foreach ($orders as $section_order){
	echo '<h1>'.$section_order['section_name'].'</h1>';
	
	$comments = $section_order['comments'];
	$breakfast_array = array();
	$lunch_array = array();
	$supper_array = array();
	
	if(!empty($section_order['breakfast'])){
		$breakfast_array = explode(';', $section_order['breakfast']);
	}
	if(!empty($section_order['lunch'])){
		$lunch_array = explode(';', $section_order['lunch']);
	}
	if(!empty($section_order['supper'])){
	    $supper_array = explode(';', $section_order['supper']);
	}
	
	$max_rows = max(count($breakfast_array), count($lunch_array), count($supper_array));
	echo '<table class="section_menu_view" ><tr><th>HOMMIKUSÖÖK</th><th>LÕUNASÖÖK</th><th>ÕHTUSÖÖK</th></tr><tr>';
	for ($i = 0; $i < $max_rows; $i++){
		echo '<tr>';
		if($i < count($breakfast_array)){
			$b_inf = explode("=", $breakfast_array[$i]);
			echo '<td class="section_menu_view"><span title="'.$b_inf[1].'">'.$b_inf[0].'</span> ('.$b_inf[2].' portsjonit)</td>';
		}else{
			echo '<td></td>';
		}
		if($i < count($lunch_array)){
			$l_inf = explode("=", $lunch_array[$i]);
			echo '<td class="section_menu_view"><span title="'.$l_inf[1].'">'.$l_inf[0].'</span> ('.$l_inf[2].' portsjonit)</td>';
		}else{
			echo '<td></td>';
		}
		if($i < count($supper_array)){
			$s_inf = explode("=", $supper_array[$i]);
			echo '<td class="section_menu_view"><span title="'.$s_inf[1].'">'.$s_inf[0].'</span> ('.$s_inf[2].' portsjonit)</td>';
		}else{
			echo '<td></td>';
		}
		echo '</tr>';
	}
	echo '</table>';
	echo '<b><p>Lisamärkused:</p></b>';
	echo '<textarea name="comments" rows="4" cols="50" disabled>'.$comments.'</textarea><br/><br/><br/>';
}

?>