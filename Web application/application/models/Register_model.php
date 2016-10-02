<?php
class Register_model extends CI_Model {



	public function create_new_user($info){
                $this->load->database();
                $sql = "INSERT INTO user (username, email, password, role) VALUES ('$info[username]', '$info[email]', MD5('$info[password]'), '$info[role]')";
		        $query = $this->db->query($sql);
		        if($query === TRUE){
			        return TRUE;
		        }else{
			        $last_query = $this->db->last_query();
		        return $last_query;
	            }
    }
	

}

	