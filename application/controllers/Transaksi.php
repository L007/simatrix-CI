<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

Class Transaksi extends CI_Controller{

	function __construct(){
		parent:: __construct();
		$this->load->model('Product_model','Product');
		$this->load->model('Admin_model','Admin_model');
		$this->load->model('Penjual_model','Penjual_model');
		$this->load->model('Transaksi_model','Transaksi_model');

	}

	public function transaksiPenjual(){
		$data['transaksi'] = $this->Penjual_model->transaksi_penjual();
		//var_dump($data);
		$this->load->view('penjual/transaksi',$data);
	}

	public function showTransaksiPembeli(){
		$id_user = $this->session->userdata('id_user');
		$data['transaksi'] = $this->Transaksi_model->show_transaksi_pembeli($id_user);
		$this->load->view('pembeli/transaksi',$data);
	}

	public function showTransaksiAdmin(){
		$data['transaksi'] = $this->Transaksi_model->show_transaksi_admin();
		$this->load->view('admin/transaksi',$data);
	}
	public function detailTransaksiPembeli($id_penjualan){
		$data['transaksi'] = $this->Transaksi_model->detail_transaksi_pembeli($id_penjualan);
		//var_dump($data);
		$this->load->view('pembeli/detailTransaksi',$data);
	}
	public function detailTransaksiAdmin($id_penjualan){
		$data['transaksi'] = $this->Transaksi_model->detail_transaksi_admin($id_penjualan);
		//var_dump($data);
		$this->load->view('admin/detailTransaksi',$data);
	}

	public function editStatusTransaksi($id_penjualan){
		$this->Transaksi_model->edit_status_transaksi($id_penjualan);
		redirect('transaksi/showTransaksiAdmin');
	}

}