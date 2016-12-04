<?php

class My_account extends CI_Controller {
	function __construct(){
	   	parent::__construct();
		$this->load->library('session');
		if(!$this->session->userdata('logged_in')){
			redirect('login');   
		}
	 }
	
	public function change_password(){
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('cur_pw', 'Vana parool', 'trim|required|callback_check_database');
		$this->form_validation->set_rules('new_pw', 'Uus parool', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('conf_pw', 'Parool uuesti', 'trim|required|matches[new_pw]');		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('header');
			$this->load->view('sidebar');
			$this->load->view('change_password');
			$this->load->view('footer');
		}else{
			$this->load->model("Account_settings_model");
			$username = $this->session->userdata('username');
			$password = $this->input->post('conf_pw');
			$result = $this->Account_settings_model->change_pw($username, $password);			
			redirect('home');
		}
	}
 
	function check_database($password){
		$this->load->model("Account_Validation");
   		$username = $this->session->userdata('username');
   		$result = $this->Account_Validation->login($username, $password);
   		if($result){
     			return true;
   		}else{
     			$this->form_validation->set_message('check_database', 'Invalid username or password');
     			return false;
   		}
 	}


	function change_department(){
		if(!$this->session->userdata('role') == 'admin'){
			redirect('home');    			
		}else{
			$this->load->Model("Account_settings_model");
			$data['departments'] = $this->Account_settings_model->get_departments();
			$this->load->view('header');
			$this->load->view('sidebar');
			$this->load->view('change_department', $data);
			$this->load->view('footer');	
		}
	}
	
	function role_changed(){
		if(!$this->session->userdata('role') == 'admin'){
			redirect('home');    			
		}else{
			$department = $this->input->post('department');
			$this->session->set_userdata('section', $department);
			redirect('home');
		}
	}	
		
}	

	
?>