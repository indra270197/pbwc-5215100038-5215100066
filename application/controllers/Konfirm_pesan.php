<?php

class Konfirm_pesan extends CI_Controller{

	function __construct(){
		parent::__construct();
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
	$type = $this->input->post('type');
	$tanggal = $this->input->post('tanggal');
  $lokasi = $this->input->post('lokasi');
  $status = $this->input->post('status');

  $data = array(
		'username' => $username,
		'type' => $type,
		'tanggal' => $tanggal,
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
