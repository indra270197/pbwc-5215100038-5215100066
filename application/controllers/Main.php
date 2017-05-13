        <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


        class Main extends CI_Controller {


         public function __construct()

         {

          parent::__construct();

         }

         public function index()

         {

          $this->load->view('main/header');

          $this->load->view('main/home');

          $this->load->view('main/footer');

         }

         public function about(){

         $this->load->view('main/header');

         $this->load->view('v_about_us');

         $this->load->view('main/footer');
         }

}
