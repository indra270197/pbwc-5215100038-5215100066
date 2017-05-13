<?php

class Usernotif_pesan extends CI_Controller{
  public function index(){
    $this->load->model('m_pesan'); //load model
    $data['hasilTransaksi'] = $this->m_pesan->getTransaksi(); //membuat data dari hasil transaksi masuk ke $data

    $this->load->view('main/header.php'); //load tampilan header, ambil di tema
    $this->load->view('v_usernotifpesan.php',$data); //load tampilan content + mengirimkan $data
    $this->load->view('main/footer.php'); //load tampilan footer, modifikasi dari tema
    }

}

?>
