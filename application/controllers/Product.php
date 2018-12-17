<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

Class Product extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('Product_model','Product_model');

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

	public function prosesInput(){

		$foto = $_FILES['foto_produk']['name'];
		$fotobaru = date('dmYHis').$foto;

		$config['upload_path']          = 'assets/foto_produk/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['file_name']			= $fotobaru;
		/*$config['max_size']             = 1000;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;*/

		$this->load->library('upload', $config);


		$id_user = $this->session->userdata('id_user');
		$nama_produk = $this->input->post('nama_produk');
		$jumlah_stok = $this->input->post('jumlah_stok');
		$harga = $this->input->post('harga');
		$deskripsi = $this->input->post('deskripsi');

		/*$foto = $_FILES['foto_produk']['name'];
		$tmp = $_FILES['foto_produk']['tmp_name'];*/
		/*$cabang=$_POST['cabang'];*/

// Rename nama fotonya dengan menambahkan tanggal dan jam upload
		//$fotobaru = date('dmYHis').$foto;
// Set path folder tempat menyimpan fotonya
		//$path = "assets/foto_produk/".$fotobaru;

		$data = array(
			'id_user' => $id_user,
			'nama_produk' => $nama_produk,
			'jumlah_stok' => $jumlah_stok,
			'harga' => $harga,
			'foto_produk' => $fotobaru,
			'deskripsi' => $deskripsi


		);


	if ($this->upload->do_upload('foto_produk')) {
		$this->Product_model->insert_product('produk',$data);
			redirect('product/lihatProduk','refresh');
	}
		
	}

	public function lihatProduk(){
		$data['produk'] = $this->Product_model->show_all_product_penjual();
		$this->load->view('penjual/lihatDataProduk',$data);
	}
	public function deleteProduct($id,$foto){
		$this->Product_model->delete_product('produk',$id);
		unlink('assets/foto_produk/'.$foto);
		redirect('product/lihatProduk','refresh');
	}

	public function edit($id){
		$where = array('id_produk'=>$id);
		$data['produk'] = $this->Product_model->edit_data('produk',$id);
		//var_dump($data);
		$this->load->view('penjual/editProduk',$data);
	}

	public function updateData(){
		$id_user = $this->session->userdata('id_user');
		$id_produk = $this->input->post('id_produk');
		$nama_produk = $this->input->post('nama_produk');
		$jumlah_stok = $this->input->post('jumlah_stok');
		$harga = $this->input->post('harga');
		$deskripsi = $this->input->post('deskripsi');

		$data = array(
			
			'nama_produk' => $nama_produk,
			'jumlah_stok' => $jumlah_stok,
			'harga' => $harga,
			
			'deskripsi' => $deskripsi


		);

		$where = array('id_produk'=>$id_produk);
		$this->Product_model->update_data($where,$data,'produk');
		redirect('product/lihatProduk');


	}
}


?>