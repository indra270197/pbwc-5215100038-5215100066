<?php

class Tabel_upload extends CI_Controller{

	function __construct(){
		parent::__construct();
		if($this->session->userdata('statusadmin') != "loginadmin"){
			redirect(base_url("login"));
		}
    $this->load->model('m_upload');
    $this->load->helper('url');
	}

	function index(){
    $data['upload'] = $this->m_upload->tampil_data()->result();
    $this->load->view('v_tabel_upload',$data);
	}

  function edit($id){
		$where = array('id' => $id);
		$data['upload'] = $this->m_pesan->edit_data($where,'pesan')->result();
		$this->load->view('v_edit_pesan',$data);
	}


function hapus($id){
  $where = array('id' => $id);
  $this->m_upload->hapus_data($where,'upload');
  redirect('tabel_upload/index');
  }

}
