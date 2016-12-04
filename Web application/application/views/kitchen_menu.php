<div class="content">
<h1>Köögi menüüd</h1>

<?php
foreach ($kitchen_menus as $menu){
	if($role == 'kokk'){
		echo '<b>'.$menu['date'].'</b><br/>';
		echo '<a href="kitchen_menu/orders/'.$menu['date'].'">Kõik tellimused</a><br/>';
		echo '<a href="kitchen_menu/view/'.$menu['date'].'">Köögi menüü</a><br/><br/><br/>';
	}else if($role == 'osakond'){
		$array = $this->menu_model->get_section_menu($menu['date'], $section_name);
		if(!empty($array)){
			echo '<a href="section_menu/view/'.$menu['date'].'">'.$menu['date'].' [Koostatud]</a><br/>';
		}else{
			echo '<a href="section_menu/create/'.$menu['date'].'">'.$menu['date'].'</a><br/>';
		}
	}else if($role == 'admin'){
		$array = $this->menu_model->get_section_menu($menu['date'], $section_name);
		if(!empty($array)){
			echo '<b>'.$menu['date'].'</b><br/>';
			echo '<a href="section_menu/view/'.$menu['date'].'">Tellimus osakonnale ('.$section_name.') [Koostatud]</a><br/>';
			echo '<a href="kitchen_menu/orders/'.$menu['date'].'">Kõik tellimused</a><br/>';
			echo '<a href="kitchen_menu/view/'.$menu['date'].'">Köögi menüü</a><br/><br/><br/>';
		}else{
			echo '<b>'.$menu['date'].'</b><br/>';
			echo '<a href="section_menu/create/'.$menu['date'].'">Tellimus osakonnale ('.$section_name.')</a><br/>';
			echo '<a href="kitchen_menu/orders/'.$menu['date'].'">Kõik tellimused</a><br/>';
			echo '<a href="kitchen_menu/view/'.$menu['date'].'">Köögi menüü</a><br/><br/><br/>';
		}
	}

}
?>