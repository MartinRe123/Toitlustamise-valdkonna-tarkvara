<h1>See on köögi menüüde kuvamise leht</h1>
<p>Siin lehel kuvatakse köögi poolt sisestatud menüüd, mille alusel saab kokku panna osakondade menüüd</p>

<p>Vajutage kuupäeval, et koostada menüü.</p>
<p>Juba koostatud menüüsid saab vaadata ja muuta samuti klõpsates kuupäeval.</p>
<?php
foreach ($kitchen_menus as $menu){
    $array = $this->menu_model->get_section_menu($menu['date'], $section_name);
    if(!empty($array)){
        echo '<a class="date_menu" href="section_menu/view/'.$menu['date'].'">'.$menu['date'].' [Juba koostatud]<br/>';
    }else{
        echo '<a class="date_menu" href="section_menu/create/'.$menu['date'].'">'.$menu['date'].'</a><br/>';
    }
}
?>