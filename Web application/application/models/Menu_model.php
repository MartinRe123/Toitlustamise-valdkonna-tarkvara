<?php
class Menu_model extends CI_Model {

	public function get_kitchen_menu($date){
        $this->load->database();
        $sql = 'SELECT * FROM kitchen_menu WHERE date ="'.$date.'"';
	    $query = $this->db->query($sql);
	    return $query->result_array();
	}
    
    
    public function get_kitchen_menus(){
        $this->load->database();
        $sql = 'SELECT * FROM kitchen_menu';
        $query = $this->db->query($sql);
	    return $query->result_array();
    }
    
    public function get_section_menu($date){
        $this->load->database();
        $sql = 'SELECT * FROM section_menu WHERE date ="'.$date.'"';
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    
    
    public function save_section_menu($date, $breakfast, $lunch, $supper, $section_worker){
        $this->load->database();
        $sql = 'INSERT INTO section_menu (date, breakfast, lunch, supper, username) VALUES ("'.$date.'", "'.$breakfast.'", "'.$lunch.'", "'.$supper.'", "'.$section_worker.'")';
        $this->db->query($sql);
    }
}
	



	