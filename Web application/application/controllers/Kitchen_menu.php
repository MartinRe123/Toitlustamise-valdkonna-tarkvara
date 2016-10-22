<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kitchen_menu extends CI_Controller {

        public function __construct(){
            parent::__construct();
    	    $this->load->library('session');
            if(!$this->session->userdata('logged_in') || $this->session->userdata('role') == 'kitchen'){
    		    redirect('home');    			
 		    }
        }

	public function index(){
        $this->load->helper('url');
		$this->load->helper('form');	
		$this->load->library('form_validation');
        $this->load->library('session');
        $this->load->view('header');
        $this->load->model('menu_model');
        $data['kitchen_menus'] = $this->menu_model->get_kitchen_menus();
		$data['section_name'] = $this->session->userdata('section');
    	$this->load->view('kitchen_menu', $data);
        $this->load->view('footer');
	}

}
	