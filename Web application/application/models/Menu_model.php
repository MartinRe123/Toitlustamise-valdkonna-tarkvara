<?php
class Menu_model extends CI_Model {

	public function get_kitchen_menu($date){
        $this->load->database();
        $sql = 'SELECT * FROM kitchen_menu WHERE date ="'.$date.'"';
	    $query = $this->db->query($sql);
	    return $query->result_array();
	}
	
	public function get_created_dates($current_date){
		$this->load->database();
        $sql = 'SELECT date FROM kitchen_menu WHERE date >= "'.$current_date.'"';
	    $query = $this->db->query($sql);
	    return $query->result_array();
	}
    
    
    public function get_kitchen_menus(){
        $this->load->database();
        $sql = 'SELECT * FROM kitchen_menu WHERE date >= "'.date("Y-m-d").'" ORDER BY date ASC';
        $query = $this->db->query($sql);
	    return $query->result_array();
    }
	
	public function get_kitchen_menus_archive(){
        $this->load->database();
        $sql = 'SELECT * FROM kitchen_menu ORDER BY date ASC';
        $query = $this->db->query($sql);
	    return $query->result_array();
    }
    
    public function get_section_menu($date, $section_name){
        $this->load->database();
        $sql = 'SELECT * FROM section_menu WHERE date ="'.$date.'" AND section_name="'.$section_name.'"';
        $query = $this->db->query($sql);
        return $query->result_array();
    }
	
	public function get_orders($date){
        $this->load->database();
        $sql = 'SELECT * FROM section_menu WHERE date ="'.$date.'"';
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function save_kitchen_menu($date, $breakfast, $lunch, $supper, $username){
        $this->load->database();
        $sql = 'INSERT INTO kitchen_menu (date, breakfast, lunch, supper, username) VALUES ("'.$date.'", "'.$breakfast.'", "'.$lunch.'", "'.$supper.'", "'.$username.'")';
        $this->db->query($sql);
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
	
	public function delete_order($date, $section_name){
		$this->load->database();
        $sql = 'DELETE FROM section_menu WHERE date = "'.$date.'" AND section_name = "'.$section_name.'"';
        $this->db->query($sql);	
	}
	
	public function delete_kitchen_menu($date){
		$this->load->database();
        $sql = 'DELETE FROM kitchen_menu WHERE date = "'.$date.'"';
        $this->db->query($sql);	
	}

	public function edit_kitchen_menu($date, $breakfast, $lunch, $supper){
		$this->load->database();
        $sql = 'UPDATE kitchen_menu SET breakfast="'.$breakfast.'", lunch="'.$lunch.'", supper="'.$supper.'" WHERE date="'.$date.'"';
        $this->db->query($sql);		
	}	
}
	



	