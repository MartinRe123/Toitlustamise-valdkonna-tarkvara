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
    
    public function get_section_menu($date, $section_name){
        $this->load->database();
        $sql = 'SELECT * FROM section_menu WHERE date ="'.$date.'" AND section_name="'.$section_name.'"';
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    
    
    public function save_section_menu($date, $breakfast, $lunch, $supper, $section_worker, $section_name, $comments){
        $this->load->database();
        $sql = 'INSERT INTO section_menu (date, breakfast, lunch, supper, username, section_name, comments) VALUES ("'.$date.'", "'.$breakfast.'", "'.$lunch.'", "'.$supper.'", "'.$section_worker.'", "'.$section_name.'", "'.$comments.'")';
        $this->db->query($sql);
    }
	
	public function edit_section_menu($date, $breakfast, $lunch, $supper, $section_worker, $section_name, $comments){
		$this->load->database();
        $sql = 'UPDATE section_menu SET breakfast="'.$breakfast.'", lunch="'.$lunch.'", supper="'.$supper.'", username="'.$section_worker.'", comments="'.$comments.'" WHERE date="'.$date.'" AND section_name="'.$section_name.'"';
        $this->db->query($sql);		
	}
	
	public function delete_kitchen_menu($date, $section_name){
		$this->load->database();
        $sql = 'DELETE FROM section_menu WHERE date = "'.$date.'" AND section_name = "'.$section_name.'"';
        $this->db->query($sql);	
	}
	
}
	



	