<?php echo 'Menüü kuupäeval '.$date.'</h1>';?>
</br>
<a href="<?php base_url() ?>/index.php/kitchen_menu">Tagasi menüüde lehele</a>

<?php
	$menu = $menu[0];
	$breakfast_array = explode(';', $menu['breakfast']);
	$lunch_array = explode(';', $menu['lunch']);
	$supper_array = explode(';', $menu['supper']);
echo '<form onsubmit="return saveKitchenMenu(\''.$this->lang->line("kitchen_menu_notification").'\');" method="post" accept-charset="utf-8" action="/index.php/kitchen_menu/save_menu_edit/">';

	echo '<label id="menu_date" for="date">Kuupäev: </label>';
	echo '<input type="date" value="'.$menu['date'].'" name="date" min="'.date("Y-m-d").'"><br/>';
	
		echo '<table>';
			echo '<td class="kitchen_menu_column">';
				echo '<table id="b">';
					echo '<p>Hommikusöök</p>';
						$i = 0;
						foreach ($breakfast_array as $breakfast) {
							if($breakfast != ""){
								$breakfast_info = explode('=', $breakfast);
								echo 'Toit:<input value="'.$breakfast_info[0].'" id="b_'.$i.'" type="text"><br/> Koostis:<br/><textarea id="b_c_'.$i.'" rows="4" cols="50">'.$breakfast_info[1].'</textarea><br/>';
								$i++;
							}
						}
				echo '</table>';
				echo '<button type="button" onClick="oneMore(\'b\');" >+</button><br/>';
			echo '</td>';
			
			echo '<td class="kitchen_menu_column">';
				echo '<table id="l">';
					echo '<p>Lõunasöök</p>';
						$i = 0;
						foreach ($lunch_array as $lunch) {
							if($lunch != ""){
								$lunch_info = explode('=', $lunch);
								echo 'Toit:<input value="'.$lunch_info[0].'" id="l_'.$i.'" type="text"><br/> Koostis:<br/><textarea id="l_c_'.$i.'" rows="4" cols="50">'.$lunch_info[1].'</textarea><br/>';
								$i++;
							}
						}
				echo '</table>';
				echo '<button type="button" onClick="oneMore(\'l\');" >+</button><br/>';
			echo '</td>';
			
			echo '<td class="kitchen_menu_column">';
				echo '<table id="s">';
					echo '<p>Hommikusöök</p>';
						$i = 0;
						foreach ($supper_array as $supper) {
							if($supper != ""){
								$supper_info = explode('=', $supper);
								echo 'Toit:<input value="'.$supper_info[0].'" id="s_'.$i.'" type="text"><br/> Koostis:<br/><textarea id="s_c_'.$i.'" rows="4" cols="50">'.$supper_info[1].'</textarea><br/>';
								$i++;
							}
						}
				echo '</table>';
				echo '<button type="button" onClick="oneMore(\'s\');" >+</button><br/>';
			echo '</td>';
		echo '</table>';

	echo '<input id="breakfast_result" name="breakfast" type="hidden" value="">';
	echo '<input id="lunch_result" name="lunch" type="hidden" value="">';
	echo '<input id="supper_result" name="supper" type="hidden" value="">';
	

	echo '<input type="submit" value="Salvesta muudatus">';
	
	
	
echo '</form>';	
?>