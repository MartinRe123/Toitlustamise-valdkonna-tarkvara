<?php
Class Account_Validation extends CI_Model{
	 function login($username, $password){
		$this->load->database();
		$pw = MD5($password);
		$sql = "SELECT * FROM user WHERE username = '$username' AND password = '$pw' LIMIT 1";
		$query = $this->db->query($sql);
		if($query -> num_rows() == 1){
			return $query->result();
		}else{
			return false;
	   }
	 }
}