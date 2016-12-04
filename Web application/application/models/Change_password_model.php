<?php
class Change_password_model extends CI_Model {
	function change_pw($username, $password){
		$this->load->database();
		$pw = MD5($password);
		$sql = "UPDATE user SET password = '$pw' WHERE username = '$username'";
	}
}