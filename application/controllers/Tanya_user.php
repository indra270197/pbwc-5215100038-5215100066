<?php

class Tanya_user extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
    $this->load->model('m_tanya');
		if($this->session->userdata('status') != "user_login"){
			redirect(base_url("user_login"));
		}
	}

	function index(){
		//$this->load->view('main/header');
		$data['tanya'] = $this->m_tanya->tampil_data()->result();
    $this->load->view('v_user_tanya',$data);
		//$this->load->view('v_tanya');
		//$this->load->view('main/footer');
	}


  function tambah(){
    $username = $this->input->post('username');
    $komentar = $this->input->post('komentar');

    $data = array(
    'username' => $username,
    'komentar' => $komentar
    );
    $this->m_tanya->input_data($data,'tanya');
    redirect('tanya');
  }

	function update(){
		$username = $this->input->post('username');
		$komentar = $this->input->post('komentar');

		$data = array(
		'username' => $username,
		'komentar' => $komentar
		);
		$this->m_tanya->input_data($data,'tanya');
		redirect('main');

	$where = array(
		'id' => $id
	);

	$this->m_tanya->update_data($where,$data,'tanya');
	redirect('tanya/index');
}

}
