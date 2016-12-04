<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Passwd_changed extends CI_Controller {
	public function index(){
		$this->load->library('session');
		$this->load->view('header');
        $this->load->view('sidebar');
		$this->load->view('password_changed');
		$this->load->view('footer');
	}
}