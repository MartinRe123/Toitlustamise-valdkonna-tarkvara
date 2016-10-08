<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

        public function __construct(){
            parent::__construct();
    	    $this->load->library('session');
            if(!$this->session->userdata('logged_in') || $this->session->userdata('role') == 'kitchen'){
    		    redirect('login');    			
 		    }
        }

	public function index(){
		$this->load->library('session');
		$this->load->view('header');
		$this->load->view('home');
		$this->load->view('footer');

	}
}
