<div class="content">
<h1><?php echo $this->lang->line("kitchen_menu"); ?></h1>

<?php
foreach ($kitchen_menus as $menu){
	if($role == 'kokk'){
		echo '<b>'.$menu['date'].'</b><br/>';
		echo '<a href="kitchen_menu/orders/'.$menu['date'].'">'.$this->lang->line("all_orders").'</a><br/>';
		echo '<a href="kitchen_menu/view/'.$menu['date'].'">'.$this->lang->line("kitchen_menu").'</a><br/><br/><br/>';
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
			if ($section_name == 'Lasteosakond') { 
				echo '<a href="section_menu/view/'.$menu['date'].'">'.$this->lang->line("order_for_dep").' ('.$this->lang->line("childrens_department").') ['.$this->lang->line("composed").']</a><br/>';
			}
			else if ($section_name == 'Kirurgia') {
				echo '<a href="section_menu/view/'.$menu['date'].'">'.$this->lang->line("order_for_dep").' ('.$this->lang->line("surgery").') ['.$this->lang->line("composed").']</a><br/>';
			}
			else if ($section_name == 'Intensiivravi') {
				echo '<a href="section_menu/view/'.$menu['date'].'">'.$this->lang->line("order_for_dep").' ('.$this->lang->line("intensive").') ['.$this->lang->line("composed").']</a><br/>';
			}
			else {
			echo '<a href="section_menu/view/'.$menu['date'].'">'.$this->lang->line("order_for_dep").' ('.$section_name.') ['.$this->lang->line("composed").']</a><br/>';
			}
			echo '<a href="kitchen_menu/orders/'.$menu['date'].'">'.$this->lang->line("all_orders").'</a><br/>';
			echo '<a href="kitchen_menu/view/'.$menu['date'].'">'.$this->lang->line("kitchen_menu").'</a><br/><br/><br/>';
		}else{
			echo '<b>'.$menu['date'].'</b><br/>';
			if ($section_name == 'Lasteosakond') { 
				echo '<a href="section_menu/create/'.$menu['date'].'">'.$this->lang->line("order_for_dep").' ('.$this->lang->line("childrens_department").')</a><br/>';
			}
			else if ($section_name == 'Kirurgia') {
				echo '<a href="section_menu/create/'.$menu['date'].'">'.$this->lang->line("order_for_dep").' ('.$this->lang->line("surgery").')</a><br/>';
			}
			else if ($section_name == 'Intensiivravi') {
				echo '<a href="section_menu/create/'.$menu['date'].'">'.$this->lang->line("order_for_dep").' ('.$this->lang->line("intensive").')</a><br/>';
			}
			else {
			echo '<a href="section_menu/create/'.$menu['date'].'">'.$this->lang->line("order_for_dep").' ('.$section_name.')</a><br/>';
			}
			echo '<a href="kitchen_menu/orders/'.$menu['date'].'">'.$this->lang->line("all_orders").'</a><br/>';
			echo '<a href="kitchen_menu/view/'.$menu['date'].'">'.$this->lang->line("kitchen_menu").'</a><br/><br/><br/>';
		}
	}

}
?>