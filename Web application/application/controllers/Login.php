<?php

class Login extends CI_Controller {
	function __construct(){
	   	parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		//$this->load->model('login_model');
		$this->load->model('Account_Validation','',TRUE);
	
	 }
 	
 	function index(){
        if($this->session->userdata('logged_in')){ //sisseloginutele ei luba uuesti sisse logimist.
			//redirect($this->session->userdata('previous_url'), 'refresh');  
            $this->load->view('header');
		    $this->load->view('home');
		    $this->load->view('footer');
 		}else{
 	 	    $data['title'] = ucfirst($this->lang->line('LOGIN_TITLE'));
		    $this->load->view('header');
		    $this->load->view('login');
		    $this->load->view('footer');
 		}
 		
 	}
 	
 	function start(){
   		$this->form_validation->set_rules('username', 'Kasutajanimi', 'trim|required');
   		$this->form_validation->set_rules('password', 'Parool', 'trim|required|callback_check_database');
		if ($this->form_validation->run() == FALSE){
		$this->load->view('header');
		$this->load->view('login');
		$this->load->view('footer');
		}else{		
			//redirect($this->session->userdata('previous_url'), 'refresh');
			$this->load->view('header');
    	    $this->load->view('home');
		    $this->load->view('footer');
		}
 	}
 
	function check_database($password){
   		$username = $this->input->post('username');
   		$result = $this->Account_Validation->login($username, $password);
   		if($result){
     			$sess_array = array();
     			foreach($result as $row){
       				$sess_array = array(
         			'username' => $row->username,
         			'logged_in' => TRUE,
       				);
       				$this->session->set_userdata($sess_array);
     			}
     			return TRUE;
   		}else{
     			$this->form_validation->set_message('check_database', 'Invalid username or password');
     			return false;
   		}
 	}
     
       
    function logout(){
   		$this->session->unset_userdata('logged_in');
   		session_destroy();
   		//redirect('home');
        $this->load->view('header');
		$this->load->view('home');
		$this->load->view('footer');
 	}

}


?>