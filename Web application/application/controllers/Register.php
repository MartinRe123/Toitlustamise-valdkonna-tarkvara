<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {


	public function index(){
        $this->load->helper('url');
    	$this->load->helper('form');	
		$this->load->library('form_validation');
		$this->load->library('session');
        
        if($this->session->userdata('logged_in') && ($this->session->userdata('role') == 'admin')){
            $this->load->view('sidebar');
            $this->load->view('header');
		    $this->load->view('register');
		    $this->load->view('footer');
        }else{
            $data['notification_message'] = 'Pead olema sisse logitud admin kontoga, et kasutajaid registreerida';
            $this->session->userdata('role');
            $this->load->view('sidebar');
            $this->load->view('header');
            $this->load->view('login', $data);
    	    $this->load->view('footer');
        }
	}


    function registrate(){
        $this->load->library('form_validation');
        $this->load->model('register_model');
        $this->load->database();
        $this->load->library('session');
		$this->form_validation->set_rules('new_username', 'Kasutajanimi', 'trim|required|is_unique[user.username]|min_length[3]|max_length[18]|alpha_dash');
		$this->form_validation->set_rules('new_password', 'Parool', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('new_password_again', 'Parool uuesti', 'trim|required|matches[new_password]');
		$this->form_validation->set_rules('new_email', 'Email', 'trim|required|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('section_box', 'Osakonna nimi', 'trim');
		

   			if ($this->form_validation->run() == FALSE){
                            $this->load->view('sidebar');
		    	$this->load->view('header');
		        $this->load->view('register');
		        $this->load->view('footer');
		    }else{
			    $user_array = array(
				    'username'     => $this->input->post('new_username'),
				    'password'     => $this->input->post('new_password'),
				    'email'        => $this->input->post('new_email'),
                    'role'         => $this->input->post('new_role'),
					'section'      => $this->input->post('new_section'),
                );
			    $this->register_model->create_new_user($user_array); 
                            $this->load->view('sidebar');
                $this->load->view('header');
		        $this->load->view('registration_complete');
		        $this->load->view('footer');
        	}
	}
}
