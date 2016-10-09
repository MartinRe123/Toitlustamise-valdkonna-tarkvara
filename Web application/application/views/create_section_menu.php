<?php echo '<h1> Osakonna menüü koostamine kuupäevaks: '.$date.'</h1>';?>
<br/>
<a href="<?php base_url() ?>/index.php/kitchen_menu">Tagasi menüüde lehele</a>

<!-- Allolev kood loob tabeli, kust osakonna töötajad saavad teha valikuid menüü koostamiseks. -->
<?php
if(!empty($menu)){
    $array = $menu[0];
    $breakfast_array = explode(';', $array['breakfast']);
    $lunch_array = explode(';', $array['lunch']);
    $supper_array = explode(';', $array['supper']);
    $breakfast_info = explode(';', $array['breakfast_info']);
    $lunch_info = explode(';', $array['lunch_info']);
    $supper_info = explode(';', $array['supper_info']);
	$s_b = false;
	$s_l = false;
	$s_s = false;

    $max_rows = max(count($breakfast_array), count($lunch_array), count($supper_array));
    echo 'Hoia hiirekursorit toidu nimetusel, et näha lisainfot.';
    echo '<form method="post" accept-charset="utf-8" action="/index.php/section_menu/save_menu/'.$date.'"><table>';
    echo '<tr><td>Hommikusöök</td><td>Lõunasöök</td><td>Õhtusöök</td></tr>';
    for ($i = 0; $i < $max_rows; $i++){
        echo '<tr>';
        if(!empty($breakfast_array[$i])){
            echo '<td><input type="radio" name="breakfast" value="'. $breakfast_array[$i] .'"';
			if($s_b == false){
				echo ' checked="checked"';
				$s_b = true;
			}
			echo '><span title="'.$breakfast_info[$i].'">'.$breakfast_array[$i].'</span></td>'; 
        }
        if(!empty($lunch_array[$i])){
			echo '<td><input type="radio" name="lunch" value="'. $lunch_array[$i] .'"';
			if($s_l == false){
				echo ' checked="checked"';
				$s_l = true;
			}
            echo '><span title="'.$lunch_info[$i].'">'.$lunch_array[$i].'</span></td>';
        }
        if(!empty($supper_array[$i])){
			echo '<td><input type="radio" name="supper" value="'. $supper_array[$i] .'"';
			if($s_s == false){
				echo ' checked="checked"';
				$s_s = true;
			}
            echo '><span title="'.$supper_info[$i].'">'.$supper_array[$i].'</span></td>';
        }
        echo '</tr>';
    }
    echo '</table><input type="submit" value="Saada tellimus"></form>';
}
?>