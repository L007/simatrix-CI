<?php
class Login extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('Login_model');
        $this->load->library('session');
        $this->load->helper('url');

    }

    public function index(){
        $this->session->sess_destroy();
        $this->load->view('login');
    }

    public function getCredentials(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $hasil = $this->Login_model->getCredentials($username, $password);
        

        if ($hasil!='0') {

            if ($hasil->level==1) {
             redirect('home/homeAdmin','refresh');
         }
         elseif ($hasil->level==2) {
            echo "2";
         }
         elseif ($hasil->level==3) {
            # code...
         }
     }
     else{
        show_404('error_404',TRUE);
    }   

    }

function logout(){
    $this->session->sess_destroy();
    redirect(base_url());
    }
}