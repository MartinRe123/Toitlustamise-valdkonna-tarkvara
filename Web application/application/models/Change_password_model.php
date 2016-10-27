<?php

	class Change_password_model extends CI_Model {
		public function isLoggedIn(){
			return $this->session->userdata("logged_in");
		}
		
		public function member_page(){
			if($this->isLoggedIn() )
			{
				return true;
			} else {
				redirect(base_url(),"refresh");
			}
		}
	}
	
		







?>

