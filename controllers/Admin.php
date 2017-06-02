<?php

class Admin extends CI_Controller{

	function __construct(){
		parent::__construct();
		if($this->session->userdata('statusadmin') != "loginadmin"){
			redirect(base_url("login"));
		}
	}

	function index(){
		$this->load->view('v_admin');
	}

}
