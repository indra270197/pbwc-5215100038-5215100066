<?php

class Form extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
    	$this->load->model('m_data');
    	$this->load->library('email');
	}

	function index(){
		$this->load->view('v_form');
	}

	function aksi(){
		$this->form_validation->set_rules('username','Username','trim|required|min_length[5]|max_length[12]|is_unique[user.username]');
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
    'password' => sha1($password),
		'email' => $email,
		'nohp' => $nohp,
		'active' => 0
    );
    $id = $this->m_data->input_data($data);
    //$id=$this->m_data->input_data($data,'user');
    //redirect('form');


    //enkripsi id
    $encrypted_id = md5($id);
  
    
    $config['protocol'] = "smtp";
		$config['smtp_host'] = "ssl://smtp.gmail.com";
		$config['smtp_port'] = "465";
		//$config['smtp_timeout'] = ‘7’;
		$config['smtp_user'] = "luphice.ice@gmail.com"; 
		$config['smtp_pass'] = "kuningkuning";
		$config['charset'] = "utf-8";
		$config['mailtype'] = "html";
		$config['newline'] = "\r\n";
		$config['validation'] = TRUE;
		$this->email->initialize($config);

		//Kirim Email
		//$this->email->to($email);
		$this->email->to($email);
		$this->email->from('luphice.ice@gmail.com','East Java Geo');
		$this->email->subject('Verifikasi akun');
		//$this->email->message('Terimakasih atas feedback yang anda berikan. Kepuasan anda adalah segalanya bagi kami');
		//$this->email->send();
    $this->email->message(
     "terimakasih telah melakuan registrasi, untuk memverifikasi silahkan klik tautan dibawah ini<br><br>".
      site_url("form/verification/$encrypted_id")
    );
  
    if($this->email->send())
    {
       echo "Berhasil melakukan registrasi, silahkan cek email kamu";
    }else
    {
       echo "Berhasil melakukan registrasi, namu gagal mengirim verifikasi email";
    }
  
    echo "<br><br><a href='".site_url("user_login")."'>Kembali ke Menu Login</a>";
	}


	public function verification($key)
{
 $this->load->helper('url');
 $this->load->model('m_data');
 $this->m_data->changeActiveState($key);
 echo "Selamat kamu telah memverifikasi akun kamu";
 echo "<br><br><a href='".site_url("user_login")."'>Kembali ke Menu Login</a>";
}





  }


