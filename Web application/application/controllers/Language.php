<?php
class Language extends CI_Controller
{
    public function __construct() {
        parent::__construct();   	 
        $this->lang->load("message","english");
    }

    function index() {
        $data["language_msg"] = $this->lang->line("msg_hello_english");
        $this->load->view('language_view', $data);
    }
}