<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

Class Home extends CI_Controller{

	function __construct(){
		parent:: __construct();
		$this->load->model('Home_model','Home'); //model('file','objectName')
		$this->load->model('Product_model','Product');
		$this->load->model('Admin_model','Admin_model');
		$this->load->model('Penjual_model','Penjual_model');

	}

	public function index(){
		$data['produk'] = $this->Product->show_all_product();
		$this->load->view('home',$data);

	}

	public function homeAdmin(){
		$hasil = $this->Admin_model->show_stat_admin();
		$data['terjual'] = $hasil['terjual'];
		$data['jumlah_stok'] = $hasil['jumlah_stok'];
		$data['produk_terlaris'] = $hasil['produk_terlaris'];
		//var_dump($data);
		$this->load->view('admin/homeAdmin',$data);
	}

	public function homePenjual(){
		$hasil = $this->Penjual_model->show_stat_penjual();
		$data['terjual'] = $hasil['terjual'];
		$data['jumlah_stok'] = $hasil['jumlah_stok'];
		$data['produk_terlaris'] = $hasil['produk_terlaris'];
		//var_dump($data);
		$this->load->view('penjual/homePenjual',$data);
	}


}


?>