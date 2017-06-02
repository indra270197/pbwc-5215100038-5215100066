<?php

class Cek_captcha extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper('captcha');
		$this->load->model('m_captcha');
		}
	
				function ceklah(){
					echo 'Submit the word you see below:';
					echo $cap['image'];
					echo '<input type="text" name="inputan" value="" />';
			
					echo '<input type="submit" value="daftar" />';
					$inputan = $this->input->post('word');
					$where = array(
						'word' => $word,
						);
					$cek = $this->m_captcha->cek_captcha("captcha",$where)->num_rows();
					if($cek > 0){

						redirect(base_url("user_login"));
						}
						else{
						//echo "Username dan password salah !";
						redirect(base_url("cek_captcha/index"));
						}

				}

				
}