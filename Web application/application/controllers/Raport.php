<?php

class Raport extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		if(!$this->session->userdata('logged_in')){
			redirect('login');   
		}
	}


	public function index(){
		$this->load->library('session');
		$this->load->view('header');
		$this->load->view('sidebar');
        $this->load->model('menu_model');
		$data['departments'] = $this->menu_model->get_departments();
		$data['searched'] = false;
		$this->load->view('raport_view', $data);
		$this->load->view('footer');
		}
	
	
	public function view($date_from, $date_to, $department){
		$this->load->model('menu_model');
		$data['departments'] = $this->menu_model->get_departments();
		$data['orders'] = $this->menu_model->get_orders_from_to($date_from, $date_to, $department);
		$data['searched'] = true;
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('raport_view', $data);
		$this->load->view('footer'); 
	
	}

	


}