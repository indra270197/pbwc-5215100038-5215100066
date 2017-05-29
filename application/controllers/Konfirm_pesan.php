<?php

class Konfirm_pesan extends CI_Controller{

	function __construct(){
		parent::__construct();
		if($this->session->userdata('statusadmin') != "loginadmin"){
			redirect(base_url("login"));
		}
    $this->load->model('m_pesan');
    $this->load->helper('url');
	}

	function index(){
    $data['pesan'] = $this->m_pesan->tampil_data()->result();
    $this->load->view('v_konfirm_pesan',$data);
	}

  function edit($id){
		$where = array('id' => $id);
		$data['pesan'] = $this->m_pesan->edit_data($where,'pesan')->result();
		$this->load->view('v_edit_pesan',$data);
	}
  function update(){
	$id = $this->input->post('id');
	$username = $this->input->post('username');
	$jenis_metode = $this->input->post('jenis_metode');
	$cakupan = $this->input->post('cakupan');
	$tanggal = $this->input->post('tanggal');
	$nohp = $this->input->post('nohp');
	$luas = $this->input->post('luas');
  $lokasi = $this->input->post('lokasi');
  $status = $this->input->post('status');

  $data = array(
		'username' => $username,
		'jenis_metode' => $jenis_metode,
		'cakupan' => $cakupan,
		'tanggal' => $tanggal,
		'nohp' => $nohp,
		'luas' => $luas,
    'lokasi' => $lokasi,
    'status' => $status
	);

	$where = array(
		'id' => $id
	);

	$this->m_pesan->update_data($where,$data,'pesan');
	redirect('konfirm_pesan/index');
}

function hapus($id){
  $where = array('id' => $id);
  $this->m_pesan->hapus_data($where,'pesan');
  redirect('konfirm_pesan/index');
  }

}
