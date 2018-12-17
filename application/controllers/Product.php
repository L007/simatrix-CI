<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

Class Product extends CI_Controller{
	function __construct(){
		parent::__construct();

	}

	public function createProduct(){
		$level = $this->session->userdata('level');

		if ($level==2) {
			$this->load->view('penjual/inputProduk');
		}
		else {

			redirect('login');
		}
	}
}


 ?>