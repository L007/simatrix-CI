<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

Class Transaksi extends CI_Controller{

	function __construct(){
		parent:: __construct();
		$this->load->model('Product_model','Product');
		$this->load->model('Admin_model','Admin_model');
		$this->load->model('Penjual_model','Penjual_model');

	}

	public function transaksiPenjual(){
		$data['transaksi'] = $this->Penjual_model->transaksi_penjual();
		//var_dump($data);
		$this->load->view('penjual/transaksi',$data);
	}

}