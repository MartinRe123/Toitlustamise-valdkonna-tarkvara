<div class="content">
<?php echo '<h1>Menüü kuupäeval '.$date.'</h1>';?>
</br>
<a id="lingid" href="<?php base_url() ?>/index.php/kitchen_menu">Tagasi menüüde lehele</a>
<br><br>

<?php
	$menu = $menu[0];
	$breakfast_array = explode(';', $menu['breakfast']);
	$lunch_array = explode(';', $menu['lunch']);
	$supper_array = explode(';', $menu['supper']);
echo '<form onsubmit="return saveKitchenMenuEdit(\''.$this->lang->line("kitchen_menu_notification").'\', \''.$date_info.'\');" method="post" accept-charset="utf-8" action="/index.php/kitchen_menu/save_menu_edit/">';

	echo '<label id="menu_date" for="date"><b>Kuupäev: </b></label>';
	//echo '<input id="date" type="date" value="'.$menu['date'].'" name="date" min="'.date("Y-m-d").'"><br/>';
	echo '<input type="text" id="date" value="'.$menu['date'].'" name="date" readonly="readonly">';
		echo '<table>';
			echo '<td class="kitchen_menu_view">';
				echo '<table id="b">';
					echo '<b><p>HOMMIKUSÖÖK</p></b>';
						$i = 0;
						foreach ($breakfast_array as $breakfast) {
							if($breakfast != ""){
								$breakfast_info = explode('=', $breakfast);
								echo '<b>Toit: </b><input value="'.$breakfast_info[0].'" id="b_'.$i.'" type="text"><br/> <b>Koostis: </b><br/><textarea id="b_c_'.$i.'" rows="4" cols="35">'.$breakfast_info[1].'</textarea><br/>';
								$i++;
							}
						}
				echo '</table>';
				echo '<button type="button" onClick="oneMore(\'b\');" >+</button><br/>';
			echo '</td>';
			
			echo '<td class="kitchen_menu_view">';
				echo '<table id="l">';
					echo '<b><p>LÕUNASÖÖK</p></b>';
						$i = 0;
						foreach ($lunch_array as $lunch) {
							if($lunch != ""){
								$lunch_info = explode('=', $lunch);
								echo '<b>Toit: </b><input value="'.$lunch_info[0].'" id="l_'.$i.'" type="text"><br/> <b>Koostis: </b><br/><textarea id="l_c_'.$i.'" rows="4" cols="35">'.$lunch_info[1].'</textarea><br/>';
								$i++;
							}
						}
				echo '</table>';
				echo '<button type="button" onClick="oneMore(\'l\');" >+</button><br/>';
			echo '</td>';
			
			echo '<td class="kitchen_menu_view">';
				echo '<table id="s">';
					echo '<b><p>ÕHTUSÖÖK</p></b>';
						$i = 0;
						foreach ($supper_array as $supper) {
							if($supper != ""){
								$supper_info = explode('=', $supper);
								echo '<b>Toit: </b><input value="'.$supper_info[0].'" id="s_'.$i.'" type="text"><br/> <b>Koostis: </b><br/><textarea id="s_c_'.$i.'" rows="4" cols="35">'.$supper_info[1].'</textarea><br/>';
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
	echo '<input name="previous_date" type="hidden" value="'.$date.'">';

	echo '<input type="submit" value="Salvesta muudatus">';
	
	
	
echo '</form>';	
?>