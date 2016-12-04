<?php
class Account_settings_model extends CI_Model {
	function change_pw($username, $password){
		$this->load->database();
		$pw = MD5($password);
		$sql = "UPDATE user SET password = '$pw' WHERE username = '$username'";
		$query = $this->db->query($sql);
	}

	public function get_departments(){
		$this->load->database();
        $sql = 'SELECT DISTINCT section_name FROM user';
	    $query = $this->db->query($sql);
	    return $query->result_array();
	}
}
