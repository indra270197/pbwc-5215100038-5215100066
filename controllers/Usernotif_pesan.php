<?php

class Usernotif_pesan extends CI_Controller{
  function __construct(){
		parent::__construct();
    if($this->session->userdata('status') != "user_login"){
			redirect(base_url("user_login"));
		}
  }
  public function index(){
    $this->load->model('m_pesan'); //load model
    $nama = $this->session->userdata("nama");
    $data['hasilTransaksi'] = $this->m_pesan->getTransaksi($nama); //membuat data dari hasil transaksi masuk ke $data
    $this->dataAda($data);
  }


    public function dataAda($data){
      $hasilTransaksi= $data['hasilTransaksi'];
      if($hasilTransaksi!=null){
        $this->load->view('main/header.php'); //load tampilan header, ambil di tema
        $this->load->view('v_usernotifpesan.php',$data); //load tampilan content + mengirimkan $data
        $this->load->view('main/footer.php'); //load tampilan footer, modifikasi dari tema
      }
      else{
        $this->load->view('main/header.php'); //load tampilan header, ambil di tema
        $this->load->view('v_usernotifpesan_gagal.php');
        $this->load->view('main/footer.php'); //load tampilan footer, modifikasi dari tema
      }
      }

    }


?>
