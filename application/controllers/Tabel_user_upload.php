<?php

class Tabel_user_upload extends CI_Controller{

	function __construct(){
		parent::__construct();
    $this->load->model('m_upload');
    $this->load->helper('url');
		if($this->session->userdata('status') != "user_login"){
			redirect(base_url("user_login"));
		}
	}

	function index(){
    $data['upload'] = $this->m_upload->tampil_data()->result();
    $this->load->view('main/header');
    $this->load->view('v_tabel_user_upload',$data);
    $this->load->view('main/footer');
	}


}
