<?php

class Section_menu extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		if(!$this->session->userdata('logged_in') || $this->session->userdata('role') == 'kokk' || $this->session->userdata('role') == 'admin'){
			redirect('home');    			
		}
	}


	public function index(){
		$this->load->library('session');
        $this->load->view('sidebar');
		$this->load->view('header');
        $this->load->model('menu_model');
		$this->load->view('section_menu');
		$this->load->view('footer');
	}
	
	
	public function view($date){
		$this->load->model('menu_model');
		$section_name = $this->session->userdata('section');
		$data['order'] = $this->menu_model->get_section_menu($date, $section_name);
		if(!empty($data['order'])){
			$this->load->library('session');
            $this->load->view('sidebar');
    		$this->load->view('header');
            $this->load->model('menu_model');
			$data['section_name'] = $section_name;
            $data['date'] = $date;
            $data['kitchen'] = $this->menu_model->get_kitchen_menu($date); //ülearune rida??
    		$this->load->view('section_menu_view', $data);
    		$this->load->view('footer'); 
		}else{
			redirect('kitchen_menu');
		}
	}
    

    public function create($date){
        $this->load->model('menu_model');
		$section_name = $this->session->userdata('section');
        $array = $this->menu_model->get_section_menu($date, $section_name);
        if(empty($array)){
        	$this->load->library('session');
            $this->load->view('sidebar');
    		$this->load->view('header');
            $this->load->model('menu_model');
	        $data['section_name'] = $section_name;
            $data['date'] = $date;
            $data['menu'] = $this->menu_model->get_kitchen_menu($date);
    		$this->load->view('create_section_menu', $data);
    		$this->load->view('footer'); 
        }else{
            redirect('kitchen_menu');
        }
    }
    
    public function save_menu($date){ //siia pean kirjutama kontrolli, et ei jäetaks tühjasid aukusid... if input post array is empty...
        $this->load->model('menu_model');
		$section_name = $this->session->userdata('section');
        $array = $this->menu_model->get_section_menu($date, $section_name);
        if(empty($array)){
            $this->load->library('session');
            $breakfast = $this->input->post('breakfast');
            $lunch = $this->input->post('lunch');
            $supper = $this->input->post('supper');
			
			$breakfast_info = ""; //pakin info kokku andmebaasi saatmiseks. valikud eraldatud ";" semikooloniga. Igas valikus "=" võrdusmärgiga eraldatud, toidu nimi, info (koostis), kogus. 
			if(!empty($breakfast)){
				foreach ($breakfast as $value){
					if($breakfast_info == ""){
						$breakfast_info = $value;
					}else{
						$breakfast_info = $breakfast_info . ";" . $value;
					}
				}
			}
			$lunch_info = "";
			if(!empty($lunch)){
				foreach ($lunch as $value){
					if($lunch_info == ""){
						$lunch_info = $value;
					}else{
						$lunch_info = $lunch_info . ";" . $value;
					}
				}
			}
			$supper_info = "";
			if(!empty($supper)){
				foreach ($supper as $value){
					if($supper_info == ""){
						$supper_info = $value;
					}else{
						$supper_info = $supper_info . ";" . $value;
					}
				}
			}			
            $username = $this->session->userdata('username');
			$section_name = $this->session->userdata('section');
			$comments = $this->input->post('comments');
            $this->load->model('menu_model');
            $this->menu_model->save_section_menu($date, $breakfast_info, $lunch_info, $supper_info, $username, $section_name, $comments);
        }				
		redirect('kitchen_menu');
    }
	
	public function edit($date){
		$this->load->model('menu_model');
		$section_name = $this->session->userdata('section');
        $data['order'] = $this->menu_model->get_section_menu($date, $section_name);
		if(!empty($data['order'])){
			$this->load->library('session');
            $this->load->view('sidebar');
    		$this->load->view('header');
            $this->load->model('menu_model');
			$data['section_name'] = $section_name;
            $data['date'] = $date;
            $data['menu'] = $this->menu_model->get_kitchen_menu($date);
    		$this->load->view('edit_section_menu', $data);
    		$this->load->view('footer'); 
        }else{
			redirect('kitchen_menu');
		}
	}
	
	public function save_menu_edit($date){
		$this->load->model('menu_model');
		$section_name = $this->session->userdata('section');
        $array = $this->menu_model->get_section_menu($date, $section_name);
        if(!empty($array)){
            $this->load->library('session');
            $breakfast = $this->input->post('breakfast');
            $lunch = $this->input->post('lunch');
            $supper = $this->input->post('supper');
			
			$breakfast_info = ""; //pakin info kokku andmebaasi saatmiseks. valikud eraldatud ";" semikooloniga. Igas valikus "=" võrdusmärgiga eraldatud, toidu nimi, info (koostis), kogus. 
			if(!empty($breakfast)){
				foreach ($breakfast as $value){
					if($breakfast_info == ""){
						$breakfast_info = $value;
					}else{
						$breakfast_info = $breakfast_info . ";" . $value;
					}
				}
			}
			$lunch_info = "";
			if(!empty($lunch)){
				foreach ($lunch as $value){
					if($lunch_info == ""){
						$lunch_info = $value;
					}else{
						$lunch_info = $lunch_info . ";" . $value;
					}
				}
			}
			$supper_info = "";
			if(!empty($supper)){
				foreach ($supper as $value){
					if($supper_info == ""){
						$supper_info = $value;
					}else{
						$supper_info = $supper_info . ";" . $value;
					}
				}
			}
			
            $username = $this->session->userdata('username');
			$section_name = $this->session->userdata('section');
			$comments = $this->input->post('comments');
            $this->load->model('menu_model');
            $this->menu_model->edit_section_menu($date, $breakfast_info, $lunch_info, $supper_info, $username, $section_name, $comments);
			redirect('section_menu/view/'.$date);
        }else{
			redirect('kitchen_menu');
		}
	}
	
	public function delete($date){
		$this->load->model('menu_model');
		$section_name = $this->session->userdata('section');
		$this->menu_model->delete_order($date, $section_name);
		redirect('kitchen_menu');
	}
}