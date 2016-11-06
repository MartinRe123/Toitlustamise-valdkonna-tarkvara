<?php

	class My_account extends CI_Controller {
	
		public function index(){}
		
		public function change_password()
		{
			$this->load->model("Change_password_model");
			$this->Change_password_model->member_page();
			
			
			
			$this->form_validation->set_rules('cur_pw','Current Password','required|callback_change');
			$this->form_validation->set_rules('new_pw','New Password','required|min_length[8]');
			$this->form_validation->set_rules('conf_pw','Confirm Password','required|matches[new_pw]');
			if ( $this->form_validation->run() != true )
			{
			$this->load->library('session');
			$this->load->view('header');
			$this->load->view('sidebar');
			$this->load->view("Change_password");
			$this->load->view('footer');
			} else {}
		}
			
		function change() {

			$sql = $this->db->select("*")->from("user")->where("username",$this->session->userdata("username"))->get();
		
			foreach($sql->result() as $my_info)
			{
				
				$current_password = $my_info->password;
				$db_id = $my_info->username;
			}
			$praegune_parool = $current_password;
			if ( md5($this->input->post("cur_pw")) == $current_password) {
				$fixed_pw = md5($this->input->post("new_pw"));
				$update = $this->db->query("UPDATE `user` SET `password` = '$fixed_pw' WHERE `username` = '$db_id'") or die(mysqli_error());
				redirect('Passwd_changed',"refresh");
			} else {
				$this->form_validation->set_message('change', 'Sisestasite vale parooli!');
				
			}
			
		
		}
		
	}	
	
	










?>