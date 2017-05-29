<?php

class Pesan extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
    $this->load->model('m_pesan');
		if($this->session->userdata('status') != "user_login"){
			redirect(base_url("user_login"));
		}
	}

	function index(){
		$this->load->view('main/header');
		$this->load->view('v_pesan');
		$this->load->view('main/footer');
	}

	function aksi(){
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('jenis_metode','Jenis_metode','required');
		$this->form_validation->set_rules('cakupan[]','cakupan','required');
		$this->form_validation->set_rules('tanggal','Tanggal','required');
		$this->form_validation->set_rules('nohp','Nohp','required');
		$this->form_validation->set_rules('luas','Luas','required');
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
    $jenis_metode = $this->input->post('jenis_metode');
		$cakupan = $this->input->post('cakupan');
		$tanggal = $this->input->post('tanggal');
		$nohp = $this->input->post('nohp');
		$luas = $this->input->post('luas');
		$lokasi = $this->input->post('lokasi');

    $data = array(
    'username' => $username,
    'jenis_metode' => $jenis_metode,
		'cakupan' => implode(",", $cakupan),
		'tanggal' => $tanggal,
		'nohp' => $nohp,
		'luas' => $luas,
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
