<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {


	public function index(){
        $this->load->helper('url');
		$this->load->helper('form');	
		$this->load->library('form_validation');
        $this->load->database();
	}


    function create(){
        $this->load->library('session');
        $this->load->view('header');
        $this->load->view('home');
        $this->load->view('footer');
    }
}
	