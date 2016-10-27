<?php

	class My_account extends CI_Controller {
	
		public function index(){}
		
		public function change_password()
		{
			$this->load->model("Change_password_model");
			$this->Change_password_model->member_page();
			
			$this->form_validation->set_rules('cur_pw','Current Password','required');
			$this->form_validation->set_rules('new_pw','New Password','required|min_length[8]');
			$this->form_validation->set_rules('conf_pw','Confirm Password','required|matches[new_pw]');
			
			if ( $this->form_validation->run() != true )
			{
			$this->load->library('session');
            $this->load->view('sidebar');
			$this->load->view('header');
			$this->load->view("Change_password");
			$this->load->view('footer');
			} else {
			$sql = $this->db->select("*")->from("user")->where("username",$this->session->userdata("username"))->get();
		
			foreach($sql->result() as $my_info)
			{
				$db_password = $my_info->password;
				$db_id = $my_info->username;
			}
			if ( md5($this->input->post("cur_pw")) == $db_password) {
				$fixed_pw = md5($this->input->post("new_pw"));
				$update = $this->db->query("UPDATE `user` SET `password` = '$fixed_pw' WHERE `username` = '$db_id'") or die(mysqli_error());
				redirect(base_url(),"refresh");
			} else {
				echo "Password is incorrect!";
				$this->load->view("vChangePassword");
			}
			
		
		}
		
		
	}
	
}









?>