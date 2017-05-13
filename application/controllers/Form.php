<?php

class Form extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
    $this->load->model('m_data');
	}

	function index(){
		$this->load->view('v_form');
	}

	function aksi(){
		$this->form_validation->set_rules('username','Username','trim|required|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('password','Password','trim|required');
		$this->form_validation->set_rules('konfir_password','Konfirmasi Password','trim|required|matches[password]');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('nohp','Nohp','trim|required|max_length[12]');

		if($this->form_validation->run() != false){
			//echo "Form validation oke";
			$this->session->set_flashdata('message', 'Validate Oke dan sudah terdaftar');
			$this->tambah();
		}else{
			$this->load->view('v_form');
		}
	}

  function tambah(){
    $username = $this->input->post('username');
    $password = $this->input->post('password');
		$email = $this->input->post('email');
		$nohp = $this->input->post('nohp');

    $data = array(
    'username' => $username,
    'password' => md5($password),
		'email' => $email,
		'nohp' => $nohp
    );
    $this->m_data->input_data($data,'user');
    redirect('form');
  }

}
