<script type="text/javascript" src="<?php echo base_url(); ?>js/date_picker_raport.js"></script>


<div class="content">
<h1>Raportid</h1>
<form onsubmit="addDates();" id="search_form" method="post" accept-charset="utf-8" action="">
<label id="raport_date_from" for="date_from"><b>Algus: </b></label>
<input type="text" id="date_from" value="<?php echo date("Y-m-d"); ?>" name="date_from" readonly="readonly">

<label id="raport_date_to" for="date_to"><b>Lõpp: </b></label>
<input type="text" id="date_to" value="<?php echo date("Y-m-d"); ?>" name="date_to" readonly="readonly">

<label id="raport_department" for="department"><b>Osakond: </b></label>



<select name="department" id="department">
	<option value="all">Kõik osakonnad</option>
<?php

	foreach($departments as $department){
		echo '<option value="'.$department['section_name'].'">'.$department['section_name'].'</option>';
	}
?>
</select>

<input type="submit" value="Otsi">
</form>

<br>
<?php if($searched){
		if(!empty($orders)){
			echo '<input type="button" value="Prindi" onclick="printRaport();"/>'; 
		}
}
?>

<div id="print">
<?php 
	if($searched){
		if(!empty($orders)){
			
			foreach($orders as $order){
				echo '<div class="raport_order_info">';
				$date = $order['date'];
				$section_name = $order["section_name"];
				$breakfast = $order["breakfast"];
				$lunch = $order["lunch"];
				$supper = $order["supper"];
				$comments = $order["comments"];
				
				$breakfast_array = explode(';', $breakfast);
				$lunch_array = explode(';', $lunch);
				$supper_array = explode(';', $supper);				
				
				echo '<h2>'.$section_name.' ('.$date.')</h2>';
				$max_rows = max(count($breakfast_array), count($lunch_array), count($supper_array));
				echo '<table class="raport_view"><tr><th>Hommikusöök</th><th>Kogus</th><th>Lõunasöök</th><th>Kogus</th><th>Õhtusöök</th><th>Kogus</th></tr><tr>';
				for ($i = 0; $i < $max_rows; $i++){
					echo '<tr >';
					if($i < count($breakfast_array)){
						$b_inf = explode("=", $breakfast_array[$i]);
						if(count($b_inf) > 1){
							echo '<td class="raport_view"><span title="'.$b_inf[1].'">'.$b_inf[0].'</td>';
							echo '<td class="raport_view2"></span> '.$b_inf[2].'</td>';
						}else{
							echo '<td></td>';
						}
					}else{
						echo '<td></td>';
					}
					if($i < count($lunch_array)){
						$l_inf = explode("=", $lunch_array[$i]);
						if(count($l_inf) > 1){
							echo '<td class="raport_view"><span title="'.$l_inf[1].'">'.$l_inf[0].'</td>';
							echo '<td class="raport_view2"></span> '.$l_inf[2].'</td>';
						}else{
							echo '<td></td>';
						}
					}else{
						echo '<td></td>';
					}
					if($i < count($supper_array)){
						$s_inf = explode("=", $supper_array[$i]);
						if(count($s_inf) > 1){
							echo '<td class="raport_view"><span title="'.$s_inf[1].'">'.$s_inf[0].'</td>';
							echo '<td class="raport_view2"></span> '.$s_inf[2].'</td>';
						}else{
							echo '<td></td>';
						}
					}else{
						echo '<td></td>';
					}
					echo '</tr>';
				}
				echo '</table>';
				if($comments){
					echo '<p><b>Lisamärkused:  </b>'.$comments.'</p>';
				}
				echo '<br/><hr><br/></div>';
			}
		}else{
			echo 'Selles ajavahemikus ei leitud ühtegi tellimust.';
		}
	}
	
?>
</div>
</div>
