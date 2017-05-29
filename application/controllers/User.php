<?php

class User extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
    $this->load->model('m_tanya');

		if($this->session->userdata('status') != "user_login"){
			redirect(base_url("user_login"));
		}
	}

	function index(){
		//$this->load->view('v_user');
		$this->load->view('main/header');

		$this->load->view('main/home');

		$data['tanya'] = $this->m_tanya->tampil_data()->result();
		$this->load->view('v_user_tanya',$data);

		$this->load->view('main/footer');
	}
}
