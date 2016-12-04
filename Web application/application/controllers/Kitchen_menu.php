<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kitchen_menu extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		if(!$this->session->userdata('logged_in')){
			redirect('login');   
		}
	}

	public function index(){
		$this->load->helper('url');
		$this->load->helper('form');	
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->model('menu_model');
		$data['kitchen_menus'] = $this->menu_model->get_kitchen_menus();
		$data['section_name'] = $this->session->userdata('section');
		$data['role'] = $this->session->userdata('role');
		$this->load->view('kitchen_menu', $data);
		$this->load->view('footer');
	}
	
	public function create(){
		if($this->session->userdata('role') == 'osakond'){
			redirect('home');    			
		}else{
			$this->load->helper('url');
			$this->load->helper('form');	
			$this->load->library('session');
			$this->load->view('header');
			$this->load->view('sidebar');
			$this->load->model('menu_model');
			$dates = $this->menu_model->get_created_dates(date("Y-m-d"));
			$date = date("Y-m-d");
			$data['date_info'] = "";
			
			foreach ($dates as $d){
				if ($data['date_info'] == ""){
					$data['date_info'] = $d['date'];
				}else{
					$data['date_info'] = $data['date_info'] . ';' .$d['date'];
				}
			}
			
			$data['kitchen_menus'] = $this->menu_model->get_kitchen_menus();
			$data['section_name'] = $this->session->userdata('section');
			$this->load->view('create_kitchen_menu', $data);
			$this->load->view('footer');
		}
	}
	
	public function save_menu(){
		if($this->session->userdata('role') == 'osakond'){
			redirect('home');    			
		}else{
			$this->load->model('menu_model');
			$this->load->library('session');
			$date = $this->input->post('date');
			$breakfast = $this->input->post('breakfast');
			$lunch = $this->input->post('lunch');
			$supper = $this->input->post('supper');	
			$username = $this->session->userdata('username');
			$this->menu_model->save_kitchen_menu($date, $breakfast, $lunch, $supper, $username);				
			redirect('kitchen_menu');
		}
	}
	
	public function orders($date){
		if($this->session->userdata('role') == 'osakond'){
			redirect('home');    			
		}else{
			$this->load->model('menu_model');
			$role = $this->session->userdata('role');
			$this->load->library('session');
			$this->load->view('header');
			$this->load->view('sidebar');
			$this->load->model('menu_model');
			$data['date'] = $date;
			$data['orders'] = $this->menu_model->get_orders($date);
			$this->load->view('view_orders', $data);
			$this->load->view('footer');
		}
    }
	
	public function view($date){
		if($this->session->userdata('role') == 'osakond'){
			redirect('home');    			
		}else{
			$this->load->model('menu_model');
			$this->load->library('session');
			$this->load->view('header');
			$this->load->view('sidebar');
			$this->load->model('menu_model');
			$data['date'] = $date;
			$data['menu'] = $this->menu_model->get_kitchen_menu($date);
			$data['orders_count'] = count($this->menu_model->get_orders($date));
			$this->load->view('kitchen_menu_view', $data);
			$this->load->view('footer'); 
		}
	}
	
	public function delete($date){
		if($this->session->userdata('role') == 'osakond'){
			redirect('home');    			
		}else{
			$this->load->model('menu_model');
			$this->menu_model->delete_kitchen_menu($date);
			$this->menu_model->delete_all_date_orders($date);
			redirect('kitchen_menu');
		}
	}
	
	public function edit($date){
		if($this->session->userdata('role') == 'osakond'){
			redirect('home');    			
		}else{
			$this->load->library('session');
			$this->load->view('header');
			$this->load->view('sidebar');
			$this->load->model('menu_model');
			$data['date'] = $date;
			$data['menu'] = $this->menu_model->get_kitchen_menu($date);
			$dates = $this->menu_model->get_created_dates(date("Y-m-d"));
			$data['orders_count'] = count($this->menu_model->get_orders($date));
			$data['date_info'] = "";
			foreach ($dates as $d){
				if ($d['date'] != $date){			
					if ($data['date_info'] == ""){
						$data['date_info'] = $d['date'];
					}else{
						$data['date_info'] = $data['date_info'] . ';' .$d['date'];
					}
				}
			}
			
			$this->load->view('edit_kitchen_menu', $data);
			$this->load->view('footer');
		}
	}
	
	public function save_menu_edit(){
		if($this->session->userdata('role') == 'osakond'){
			redirect('home');    			
		}else{
			$this->load->library('session');
			$breakfast = $this->input->post('breakfast');
			$lunch = $this->input->post('lunch');
			$supper = $this->input->post('supper');
			$date = $this->input->post('date');
			$previous_date = $this->input->post('previous_date');
			$this->load->model('menu_model');
			$this->menu_model->delete_all_date_orders($date);
			if($previous_date == $date){ //kui leidub menüü sellel kuupäeval
				$this->menu_model->edit_kitchen_menu($date, $breakfast, $lunch, $supper);
			}else if(!empty($this->menu_model->get_kitchen_menu($date))){ //kui kuupäeva ei muudeta
				$this->menu_model->edit_kitchen_menu($date, $breakfast, $lunch, $supper);
				$this->menu_model->delete_kitchen_menu($previous_date);
			}else{
				$username = $this->session->userdata('username');
				$this->menu_model->save_kitchen_menu($date, $breakfast, $lunch, $supper, $username);
				$this->menu_model->delete_kitchen_menu($previous_date);
			}
			redirect('kitchen_menu/view/'.$date);
		}
	}
}
	