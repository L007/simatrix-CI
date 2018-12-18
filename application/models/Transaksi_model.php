<?php
Class Transaksi_model extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->library('session');
	}

	public function show_transaksi_pembeli($id_user){
		return $this->db->query("SELECT * from tb_penjualan where id_user=".$id_user)->result();

	}

	public function detail_transaksi_pembeli($id_penjualan){
		return $this->db->query("SELECT p.nama_produk,dp.jumlah,dp.total_harga,dp.tanggal FROM detail_penjualan dp
			JOIN produk p on dp.id_produk=p.id_produk
			WHERE id_penjualan=".$id_penjualan)->result();

	}


}

?>



