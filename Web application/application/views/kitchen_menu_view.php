<div class="content">
<?php echo '<h1>Menüü kuupäeval '.$date.'</h1>';?>
</br>
<a id="lingid" href="<?php base_url() ?>/index.php/kitchen_menu">Tagasi menüüde lehele</a>
<br><br>

<?php 

    $array_menu = $menu[0];	
	
	$breakfast_array = array();
	$lunch_array = array();
	$supper_array = array();
	
	if(!empty($array_menu['breakfast'])){
		$breakfast_array = explode(';', $array_menu['breakfast']);
	}
	if(!empty($array_menu['lunch'])){
		$lunch_array = explode(';', $array_menu['lunch']);
	}
	if(!empty($array_menu['supper'])){
	    $supper_array = explode(';', $array_menu['supper']);
	}
	
	$max_rows = max(count($breakfast_array), count($lunch_array), count($supper_array));
	echo '<table class = "kitchen_menu_view"><tr><th>Hommikusöök</th><th>Lõunasöök</th><th>Õhtusöök</th></tr><tr>';
	for ($i = 0; $i < $max_rows; $i++){
		echo '<tr>';
		if($i < count($breakfast_array)){
			$b_inf = explode("=", $breakfast_array[$i]);
			echo '<td class="kitchen_menu_view"><span title="'.$b_inf[1].'">'.$b_inf[0].'</span></td>';
		}else{
			echo '<td></td>';
		}
		if($i < count($lunch_array)){
			$l_inf = explode("=", $lunch_array[$i]);
			echo '<td class="kitchen_menu_view"><span title="'.$l_inf[1].'">'.$l_inf[0].'</span></td>';
		}else{
			echo '<td></td>';
		}
		if($i < count($supper_array)){
			$s_inf = explode("=", $supper_array[$i]);
			echo '<td class="kitchen_menu_view"><span title="'.$s_inf[1].'">'.$s_inf[0].'</span></td>';
		}else{
			echo '<td></td>';
		}
		echo '</tr>';
	}
	echo '</table>';
?>

<br>
<a id="lingid" href="<?php base_url() ?>/index.php/kitchen_menu/edit/<?php echo $date ?>">Muuda menüüd</a>
<a id="lingid" onclick="deleteConfirmation(this, '<?php base_url() ?>/index.php/kitchen_menu/delete/<?php echo $date; ?>');" href="">Kustuta menüü</a>
