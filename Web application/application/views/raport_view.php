<script type="text/javascript" src="<?php echo base_url(); ?>js/date_picker_raport.js"></script>


<div class="content">
<h1><?php echo $this->lang->line("raports"); ?></h1>
<form onsubmit="addDates();" id="search_form" method="post" accept-charset="utf-8" action="">
<label id="raport_date_from" for="date_from"><b><?php echo $this->lang->line("beginning"); ?>: </b></label>
<input type="text" id="date_from" value="<?php echo date("Y-m-d"); ?>" name="date_from" readonly="readonly">

<label id="raport_date_to" for="date_to"><b><?php echo $this->lang->line("end"); ?>: </b></label>
<input type="text" id="date_to" value="<?php echo date("Y-m-d"); ?>" name="date_to" readonly="readonly">

<label id="raport_department" for="department"><b><?php echo $this->lang->line("department"); ?>: </b></label>



<select name="department" id="department">
	<option value="all"><?php echo $this->lang->line("all_departments"); ?></option>
<?php
	foreach($departments as $department){
		if($department['section_name'] == 'Lasteosakond'){
			echo '<option value="'.$department['section_name'].'">'.$this->lang->line("childrens_department").'</option>';
		}
		else if ($department['section_name'] == 'Kirurgia'){
			echo '<option value="'.$department['section_name'].'">'.$this->lang->line("surgery").'</option>';
		}
		else if ($department['section_name'] == 'Intensiivravi'){
			echo '<option value="'.$department['section_name'].'">'.$this->lang->line("intensive").'</option>';
		}
		else {
			echo '<option value="'.$department['section_name'].'">'.$department['section_name'].'</option>';
		}
	}
?>
</select>

<input type="submit" value=<?php echo $this->lang->line("search"); ?>>
</form>

<br>
<?php if($searched){
		if(!empty($orders)){
			echo '<input type="button" value='.$this->lang->line("print_raport").' onclick="printRaport();"/>'; 
		}
}
?>

<div id="print">
<?php 
echo '<div id="swap_top"></div>';


function addIngredientsToTotal($ingredients, $list, $count){
	foreach($ingredients as $ingredient){
		$split = explode(" ",$ingredient);
		$len = count($split);
		$amount = str_replace(",",".",$split[$len-2]);
		$unit = $split[$len-1];
		mb_internal_encoding('UTF-8');
		$name = mb_strtolower(implode(" ",array_slice($split,0,$len-2)));		
		if(array_key_exists($name, $list)){
			if($unit === explode(' ',$list[$name])[1]){
				$list[$name] = (string) (floatval(str_replace(' '.$unit,"",$list[$name])) + floatval($amount)*$count) . ' ' . $unit;
			}else{
				$list[$name."(2)"] = (string) (floatval($amount)*$count) . ' ' . $unit;
			}
		}else{
			$list[$name] = (string) (floatval($amount)*$count) . ' ' . $unit;
		}
	}
	return $list;
}


	if($searched){
		if(!empty($orders)){
			$ingredients = array();
			
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
				
				if ($section_name == 'Kirurgia'){
					echo '<h2>'.$this->lang->line("surgery").' ('.$date.')</h2>';
				}
				else if ($section_name == 'Lasteosakond'){
					echo '<h2>'.$this->lang->line("childrens_department").' ('.$date.')</h2>';
				}
				else if ($section_name == 'Intensiivravi'){
					echo '<h2>'.$this->lang->line("intensive").' ('.$date.')</h2>';
				}
				else {
					echo '<h2>'.$section_name.' ('.$date.')</h2>';}
				
				$max_rows = max(count($breakfast_array), count($lunch_array), count($supper_array));
				echo '<table class="raport_view"><tr><th>'.$this->lang->line("breakfast").'</th><th>'.$this->lang->line("amount").'</th><th>'.$this->lang->line("lunch").'</th><th>'.$this->lang->line("amount").'</th><th>'.$this->lang->line("dinner").'</th><th>'.$this->lang->line("amount").'</th></tr><tr>';
				for ($i = 0; $i < $max_rows; $i++){
					echo '<tr >';
					if($i < count($breakfast_array)){
						$b_inf = explode("=", $breakfast_array[$i]);
						if(count($b_inf) > 1){
							echo '<td class="raport_view"><span title="'.str_replace("|","\n",$b_inf[1]).'">'.$b_inf[0].'</td>';
							echo '<td class="raport_view2"></span> '.$b_inf[2].'</td>';
							$ingredients = addIngredientsToTotal(explode("|",$b_inf[1]), $ingredients, $b_inf[2]);
						}else{
							echo '<td></td><td></td>';
						}
					}else{
						echo '<td></td><td></td>';
					}
					if($i < count($lunch_array)){
						$l_inf = explode("=", $lunch_array[$i]);
						if(count($l_inf) > 1){
							echo '<td class="raport_view"><span title="'.str_replace("|","\n",$l_inf[1]).'">'.$l_inf[0].'</td>';
							echo '<td class="raport_view2"></span> '.$l_inf[2].'</td>';
							$ingredients = addIngredientsToTotal(explode("|",$l_inf[1]), $ingredients, $l_inf[2]);
						}else{
							echo '<td></td><td></td>';
						}
					}else{
						echo '<td></td><td></td>';
					}
					if($i < count($supper_array)){
						$s_inf = explode("=", $supper_array[$i]);
						if(count($s_inf) > 1){
							echo '<td class="raport_view"><span title="'.str_replace("|","\n",$s_inf[1]).'">'.$s_inf[0].'</td>';
							echo '<td class="raport_view2"></span> '.$s_inf[2].'</td>';
							$ingredients = addIngredientsToTotal(explode("|",$s_inf[1]), $ingredients, $s_inf[2]);
						}else{
							echo '<td></td><td></td>';
						}
					}else{
						echo '<td></td><td></td>';
					}
					echo '</tr>';
				}
				echo '</table>';
				if($comments){
					echo '<p><b>'.$this->lang->line("comments").':  </b>'.$comments.'</p>';
				}
				echo '<br/><hr><br/></div>';
			}
			
			$list_keys = array_keys($ingredients);
			asort($list_keys);
			$c = 0;
			echo '<div id="swap_bottom"><h1>'.$this->lang->line("from_storage").':</h1>';
			echo '<table class="raport_view">';
			foreach($list_keys as $name){
				if($c % 5 == 0){
					echo '<tr>';
				}
				echo '<td class="raport_view">'.$name.' '.$ingredients[$name].'</td>';
				if($c % 5 == 4){
					echo '</tr>';
				}
				$c++;
			}
			echo '</table><hr></div><script type="text/javascript"> ingredientsToTop(); </script>';
			
		}else{
			echo ''.$this->lang->line("no_orders_found").'.';
		}
	}
	
?>
</div>
</div>