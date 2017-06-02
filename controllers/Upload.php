<?php

class Upload extends CI_Controller{

	function __construct(){
		parent::__construct();
		if($this->session->userdata('statusadmin') != "loginadmin"){
			redirect(base_url("login"));
		}
		  $this->load->helper(array('form', 'url'));
			$this->load->model('m_upload');
	}

	public function index(){
		$this->load->view('v_upload');
	}

	public function create(){
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->library('upload');
			$is_submit = $this->input->post('is_submit');
			if(isset($is_submit) && $is_submit == 1){
						$fileUpload = array();
						$isUpload = FALSE;
						$config = array(
						'upload_path' => './portofolio/',
						'allowed_types' => '*',
						'max_size' => 100000
						);
						$this->upload->initialize($config);
						if($this->upload->do_upload('userfile')){
							$fileUpload = $this->upload->data();
							$isUpload = TRUE;
						}
							if($isUpload){
							$data =array(
								'keterangan' => $this->input->post('keterangan'),
								'nama_file' => $fileUpload['file_name']
							);
								$this->m_upload->set_upload($data);
								redirect('upload');
							}
					}
					else{
					$this->load->view('v_upload');
				}
				}

}
