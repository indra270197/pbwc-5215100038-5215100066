        <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


        class Awal extends CI_Controller {


         public function __construct()

         {

          parent::__construct();
          $this->load->library('form_validation');
          $this->load->model('m_tanya');
          //if($this->session->userdata('status') != "user_login"){
      			//redirect(base_url("user_login"));
      		//}

         }

         public function index()

         {

          $this->load->view('main/headerawal');

          $this->load->view('main/homeawal');

          //$data['tanya'] = $this->m_tanya->tampil_data()->result();
          //$this->load->view('v_user_tanya',$data);


          $this->load->view('main/footer');

         }

         public function about(){

         $this->load->view('main/headerawal');

         $this->load->view('v_about_us');

         $this->load->view('main/footer');
         }

         public function service(){

         $this->load->view('main/headerawal');

         $this->load->view('v_service');

         $this->load->view('main/footer');
          }

         public function contact(){

         $this->load->view('main/headerawal');

         $this->load->view('v_contact');

         $this->load->view('main/footer');
         }

}
