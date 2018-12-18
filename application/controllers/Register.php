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

    public function createUser(){
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $email = $this->input->post('email');
        $no_telepon = $this->input->post('no_telepon');
        
        $data = array(
            'nama' => $nama,
            'username' => $username,
            'password' => $password,
            'email' => $email,
            'level' => 3,
            'no_telepon' => $no_telepon,

        );

        $this->Register_model->create_user('users',$data);
        redirect('login/','refresh');
    }

}
 ?>