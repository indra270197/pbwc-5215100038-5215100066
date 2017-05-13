<?php

class Pesan extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
    $this->load->model('m_pesan');
	}

	function index(){
		$this->load->view('main/header');
		$this->load->view('v_pesan');
		$this->load->view('main/footer');
	}

	function aksi(){
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('type','Type','required');
		$this->form_validation->set_rules('tanggal','Tanggal','required');
		$this->form_validation->set_rules('lokasi','Lokasi','required');

		if($this->form_validation->run() != false){
			//echo "Form validation oke";
			$this->session->set_flashdata('pesan', 'Pesan anda sudah terkirim, tunggu konfirmasi dari kami');
			$this->tambah();
		}else{
			$this->load->view('main/header');
			$this->load->view('v_pesan');
			$this->load->view('main/footer');
		}
	}

  function tambah(){
    $username = $this->input->post('username');
    $type = $this->input->post('type');
		$tanggal = $this->input->post('tanggal');
		$lokasi = $this->input->post('lokasi');

    $data = array(
    'username' => $username,
    'type' => $type,
		'tanggal' => $tanggal,
		'lokasi' => $lokasi,
    );
    $this->m_pesan->input_data($data,'pesan');
    redirect('pesan');
  }

	function getType(){
		$data = $this->m_pesan->getType();
		$this->load->view('v_pesan', array('data'=> $data));
	}
	
}
