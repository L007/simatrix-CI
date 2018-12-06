<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

Class Home extends CI_Controller{

	function __construct(){
		parent:: __construct();
		$this->load->model('Home_model','Home'); //model('file','objectName')
		$this->load->model('Product_model','Product');

	}

	public function index(){
		$data['produk'] = $this->Product->show_all_product();
		$this->load->view('home',$data);

	}


}


 ?>