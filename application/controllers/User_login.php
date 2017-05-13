<?php

class User_login extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('m_user_login');

	}

	function index(){
		$this->load->view('v_user_login');
	}

	function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => md5($password)
			);
		$cek = $this->m_user_login->cek_login("user",$where)->num_rows();
		if($cek > 0){

			$data_session = array(
				'nama' => $username,
				'status' => "user_login"
				);

			$this->session->set_userdata($data_session);

			redirect(base_url("user"));

		}else{
			//echo "Username dan password salah !";
			$this->session->set_flashdata('message', 'Ada username/password yg salah');
			redirect(base_url("user_login"));
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('user_login'));
	}
}
