<h1>See on köögi menüüde kuvamise leht</h1>
<p>Siin lehel kuvatakse köögi poolt sisestatud menüüd, mille alusel saab kokku panna osakondade menüüd</p>

<p>Vajutage kuupäeval, et koostada menüü</p>
<?php
foreach ($kitchen_menus as $menu){
    $array = $this->menu_model->get_section_menu($menu['date']);
    if(!empty($array)){
        echo $menu['date'].' <- sellel kuupäeval on osakonna menüü juba koostatud<br/>';
    }else{
        echo '<a href="section_menu/create/'.$menu['date'].'">'.$menu['date'].'</a><br/>';
    }
}
?>