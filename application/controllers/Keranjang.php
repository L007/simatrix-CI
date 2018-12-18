<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

Class Keranjang extends CI_Controller{

	function __construct(){
		
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Keranjang_model','Keranjang_model');

	}

	public function addCart(){
		$_SESSION['id_produk'][] = $this->input->post('id_produk');
		$_SESSION['jumlah'][] = $this->input->post('jumlah');
		//redirect('') // ke keranjang

		/*$this->session->set_flashdata('id_produk',$id_produk);
		$this->session->set_flashdata('jumlah',$jumlah); */

		var_dump($this->session->userdata('jumlah'));
	}

	public function showCart(){
		if(array_key_exists('id_produk',$_SESSION) && !empty($_SESSION['id_produk'])) {
			$id_produk= $this->session->userdata('id_produk');
			$data['keranjang'] = $this->Keranjang_model->show_cart($id_produk);
			//var_dump($data);
			// $posts=Keranjang::showCart($id_produk);  
			$this->load->view('pembeli/keranjang',$data);
		}
	}
}
?>