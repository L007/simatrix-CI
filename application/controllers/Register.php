<?php 
class Register extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('Register_model','Register_model');
        $this->load->library('session');
        $this->load->helper('url');

    }

    public function index(){
        $this->session->sess_destroy();
        $this->load->view('register');
    }

}
 ?>