<?php

class User extends CI_Controller{

	function __construct(){
		parent::__construct();

		if($this->session->userdata('status') != "user_login"){
			redirect(base_url("user_login"));
		}
	}

	function index(){
		//$this->load->view('v_user');
		$this->load->view('main/header');

		$this->load->view('main/home');

		$this->load->view('main/footer');
	}
}
