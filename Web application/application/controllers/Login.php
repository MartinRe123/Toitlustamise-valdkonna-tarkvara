<?php

class Login extends CI_Controller {
	function __construct(){
	   	parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('Account_Validation','',TRUE);
	 }
 	
 	function index(){
        if($this->session->userdata('logged_in')){ //sisseloginutele ei luba uuesti sisse logimist.
            $data['notification_message'] = 'Olete juba sisse loginud, kasutaja vahetamiseks logige esmalt välja.';
            $this->load->view('header');
			$this->load->view('sidebar');
		    $this->load->view('home', $data);
		    $this->load->view('footer');
 		}else{ //kui pole veel sisse logitud
			if (!isset($_SESSION['site_lang'])){
				$this->session->set_userdata('site_lang', 'estonian');
				redirect('login');
			}
 	 	    $data['title'] = ucfirst($this->lang->line('LOGIN_TITLE'));
		    $this->load->view('header');
			$this->load->view('sidebar');
		    $this->load->view('login');
		    $this->load->view('footer');
 		}
 		
 	}
 	
 	function start(){
        $this->load->library('form_validation');
   		$this->form_validation->set_rules('username', 'Kasutajanimi', 'trim|required');
   		$this->form_validation->set_rules('password', 'Parool', 'trim|required|callback_check_database');
		
        if ($this->form_validation->run() == FALSE){
		    $this->load->view('header');
			$this->load->view('sidebar');
		    $this->load->view('login');
		    $this->load->view('footer');
		}else{		
            redirect('home');
		}
 	}
 
	function check_database($password){
   		$username = $this->input->post('username');
   		$result = $this->Account_Validation->login($username, $password);
   		if($result){
     			$sess_array = array();
     			foreach($result as $row){
       				$sess_array = array(
         			'username'   => $row->username,
         			'logged_in'  => TRUE,
                    'role'       => $row->role,
					'section'	 => $row->section_name,
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
		$this->session->unset_userdata('username');
   		$this->session->unset_userdata('role');
   		$this->session->unset_userdata('section');
   		redirect('login');
 	}


}


?>