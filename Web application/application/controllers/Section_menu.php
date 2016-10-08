<?php

class Section_menu extends CI_Controller {

        public function __construct(){
            parent::__construct();
    	    $this->load->library('session');
            if(!$this->session->userdata('logged_in') || $this->session->userdata('role') == 'kitchen'){
    		    redirect('home');    			
 		    }
        }


	public function index(){
		$this->load->library('session');
		$this->load->view('header');
        $this->load->model('menu_model');
		$this->load->view('section_menu');
		$this->load->view('footer');

	}
    
    
    public function create($date){
        $this->load->model('menu_model');
        $array = $this->menu_model->get_section_menu($date);
        if(empty($array)){
        	$this->load->library('session');
    		$this->load->view('header');
            $this->load->model('menu_model');
            $data['date'] = $date;
            $data['menu'] = $this->menu_model->get_kitchen_menu($date);
    		$this->load->view('create_section_menu', $data);
    		$this->load->view('footer'); 
        }else{
            redirect('kitchen_menu');
        }
    }
    
    public function save_menu($date){
        $this->load->model('menu_model');
        $array = $this->menu_model->get_section_menu($date);
        if(empty($array)){
            $this->load->library('session');
            $breakfast = $this->input->post('breakfast');
            $lunch = $this->input->post('lunch');
            $supper = $this->input->post('supper');
            $username = $this->session->userdata('username');
            $this->load->model('menu_model');
            $this->menu_model->save_section_menu($date, $breakfast, $lunch, $supper, $username);
        }
        redirect('kitchen_menu');
    }
}